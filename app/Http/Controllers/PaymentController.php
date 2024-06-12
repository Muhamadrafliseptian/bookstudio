<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaymentTransaction;
use App\Models\PointPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createPayment(Request $request, $id_paket)
    {
        $waktuPesanCarbon = Carbon::createFromFormat('H:i', $request->waktu_pesan);

        $startTime = Carbon::createFromTime(10, 0, 0);
        $endTime = Carbon::createFromTime(22, 0, 0);

        if ($waktuPesanCarbon->between($startTime, $endTime)) {
            $user = Auth::user();

            $paket = Paket::where("id_paket", $id_paket)->first();

            $durationMinutes = $paket->duration_end;

            $currentDateTime = Carbon::now("Asia/Jakarta");
            $currentDate = $currentDateTime->toDateString();
            $currentTime = $currentDateTime->format("H:i");

            if ($request->tanggal_pesan < $currentDate) {
                return back()->with("error", "Tidak Bisa Booking Karena Tanggal Sudah Lewat");
            }

            if ($request->tanggal_pesan == $currentDate && $request->waktu_pesan <= $currentTime) {
                return back()->with("error", "Tidak Bisa Booking Karena Waktu Sudah Lewat");
            }

            $bookingEndTime = $waktuPesanCarbon->copy()->addMinutes($durationMinutes);

            $existingBooking = PaymentTransaction::where('tanggal_pesan', $request->tanggal_pesan)
                ->where('paket_id', $id_paket)
                ->where(function ($query) use ($waktuPesanCarbon, $bookingEndTime) {
                    $query->where(function ($query) use ($waktuPesanCarbon, $bookingEndTime) {
                        $query->whereBetween('waktu_pesan', [$waktuPesanCarbon, $bookingEndTime]);
                    })
                        ->orWhere(function ($query) use ($waktuPesanCarbon, $bookingEndTime) {
                            $query->whereBetween('waktu_pesan', [$waktuPesanCarbon->subSecond(), $bookingEndTime->subSecond()]);
                        });
                })
                ->first();

            if ($existingBooking) {
                return back()->with("error", "Tidak Bisa Booking");
            }

            $xenditSecretKey = 'xnd_development_b08GFNgK4ERdx3do9HtFXOnMAcJlrj75tGJh15Nd1OA9YxuOY342GBmESts4T';

            if ($request->klaim != "1") {

                $response = Http::withHeaders([
                    'Authorization' => 'Basic ' . base64_encode($xenditSecretKey . ':'),
                    'Content-Type' => 'application/json',
                ])->post('https://api.xendit.co/v2/invoices', [
                    'external_id' => uniqid(),
                    'amount' => $paket->amount,
                    'payer_email' => $user->email,
                    'description' => 'Pembayaran Booking Studio ' . $paket->name,
                    'success_redirect_url' => 'http://127.0.0.1:8000/history_booking',
                    "invoice_duration" => 1800,
                    "locale" => "id",
                    'customer' => [
                        'email' => $user->email,
                        'mobile_number' => $user->no_hp
                    ],
                    "customer_notification_preference" => [
                        "invoice_created" => ["whatsapp", "email"],
                        "invoice_reminder" => ["whatsapp", "email"],
                        "invoice_paid" => ["whatsapp", "email"],
                    ]
                ]);

                $invoice = $response->json();
            }

            $paymentTransaction = PaymentTransaction::create([
                'external_id' => empty($invoice["external_id"]) ? date("YmdHis") : $invoice['external_id'],
                'invoice_url' => empty($invoice["invoice_url"]) ? null : $invoice['invoice_url'],
                'payment_status' => empty($invoice["status"]) ? "PAID" : $invoice['status'],
                'user_id' => $user->id,
                'paket_id' => $id_paket,
                'tanggal_pesan' => $request->tanggal_pesan,
                'waktu_pesan' => $request->waktu_pesan
            ]);

            if (!empty($request->klaim)) {
                $pointPayment = PointPayment::where("user_id", Auth::user()->id)
                    ->where("status", "Belum di Ambil")
                    ->where("acc_point", NULL)
                    ->orderBy("id", "ASC")
                    ->first();

                $pointPayment->update([
                    "status" => "Sudah di Ambil",
                    "acc_point" => date("Y-m-d H:i:s")
                ]);
            }


            if (empty($invoice)) {
                return redirect()->to("history_booking");
            } else {
                return redirect($invoice['invoice_url']);
            }
        } else {
            return back()->with("error", "Tidak Bisa Booking Karena Bukan Waktu Yang Ditentukan");
        }
    }

    public function callbackReturn(Request $request)
    {
        $user = Auth::user();

        $paymentTransaction = PaymentTransaction::where('external_id', $request->external_id)->first();
        if ($paymentTransaction) {
            $paymentTransaction->payment_status = $request->status;
            $paymentTransaction->payment_channel = $request->payment_channel;
            $paymentTransaction->payment_method = $request->payment_method;
            $paymentTransaction->kode_booking = $request->external_id;
            $paymentTransaction->save();

            $cekPointPayment = PointPayment::where("user_id", $paymentTransaction->user_id)
                ->where("status", "Belum di Ambil")
                ->first();

            if (!$cekPointPayment) {
                PointPayment::create([
                    "user_id" => $paymentTransaction->user_id,
                    "status" => "Belum di Ambil",
                    "point" => 1,
                ]);
            } else {
                $cekPointPaymentTwo = PointPayment::where("user_id", $paymentTransaction->user_id)
                    ->where("status", "Belum di Ambil")
                    ->orderBy("id", "DESC")
                    ->first();

                if ($cekPointPaymentTwo->point % 3 == 0) {
                    PointPayment::create([
                        "user_id" => $paymentTransaction->user_id,
                        "status" => "Belum di Ambil",
                        "point" => 1,
                    ]);
                } else {
                    $cekPointPaymentTwo->update([
                        "point" => $cekPointPaymentTwo->point + 1
                    ]);
                }
            }

            return response()->json(['message' => 'Callback received and processed'], 200);
        }
    }

    public function selectPaket()
    {
        $paketData = Paket::get();
        return view("layouts.user.pages.index", [
            "paketData" => $paketData
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaymentTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createPayment(Request $request, $id_paket)
    {
        $user = Auth::user();

        $paket = Paket::where("id_paket", $id_paket)->first();
        $xenditSecretKey = 'xnd_development_8NKXeQg1kJ3abwLfZEFozhxfS2v6TkZTIVK5BRkZsrrBQEKHmsB9mW7viOU00';

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
        PaymentTransaction::create([
            'external_id' => $invoice['external_id'],
            'invoice_url' => $invoice['invoice_url'],
            'payment_status' => $invoice['status'],
            'user_id' => $user->id,
            'paket_id' => $id_paket,
            'tanggal_pesan' => $request->tanggal_pesan
        ]);

        return redirect($invoice['invoice_url']);
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

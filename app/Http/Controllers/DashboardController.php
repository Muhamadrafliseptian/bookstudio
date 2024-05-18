<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransaction;
use App\Models\Saran;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAdmin = User::where('level', 0)->count();
        $totalUser = User::where('level', 1)->count();
        $totalSaran = Saran::get()->count();
        $totalPesan = PaymentTransaction::get()->count();
        $userData = User::where('level', 1)->take(1)->latest()->get();
        $adminData = User::where('level', 0)->take(1)->latest()->get();
        $saranData = Saran::latest()->get();
        $dataPesan = PaymentTransaction::latest()->take(1)->get();
        $transaction = PaymentTransaction::get();

        foreach ($saranData as $saran) {
            $saran->created_at = Carbon::parse($saran->created_at)->setTimezone('Asia/Jakarta');
        }

        return view('layouts.admin.pages.index', [
            'totalAdmin' => $totalAdmin,
            'totalUser' => $totalUser,
            'totalSaran' => $totalSaran,
            "totalPesan" => $totalPesan,
            'userData' => $userData,
            'adminData' => $adminData,
            'saranData' => $saranData,
            "dataPesan" => $dataPesan,
            "transaction" => $transaction
        ]);
    }
    public function dataUser()
    {
        $dataUser = User::where("level", 1)->latest()->get();
        foreach ($dataUser as $data) {
            $data->created_at = Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta');
        }
        return view('layouts.admin.pages.user', [
            "dataUser" => $dataUser
        ]);
    }
    public function dataAdmin()
    {
        $dataAdmin = User::where("level", 0)->latest()->get();
        foreach ($dataAdmin as $data) {
            $data->created_at = Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta');
        }
        return view('layouts.admin.pages.admin', [
            "dataAdmin" => $dataAdmin
        ]);
    }
    public function dataSaran()
    {
        $dataSaran = Saran::latest()->get();
        foreach ($dataSaran as $data) {
            $data->created_at = Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta');
        }
        return view('layouts.admin.pages.saran', [
            "dataSaran" => $dataSaran
        ]);
    }
    public function dataTransaksi()
    {
        $dataTransaksi = PaymentTransaction::latest()->get();
        foreach ($dataTransaksi as $data) {
            $data->created_at = Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta');
        }
        return view('layouts.admin.pages.index-transaksi', [
            "dataTransaksi" => $dataTransaksi
        ]);
    }
    public function showPayment()
    {
        $dataPesan = PaymentTransaction::get();
        return view('layouts.admin.pages.index', [
            "dataPesan" => $dataPesan
        ]);
    }

    public function transaksi()
    {
        try {

            DB::beginTransaction();

            $bulan = date("M");
            $carbonBulan = Carbon::createFromFormat('M', $bulan);
            $data["bulanData"] = empty(session("bulan")) ? $carbonBulan->format('m') : session("bulan");

            $data = [
                "transaction" => PaymentTransaction::whereMonth("tanggal_pesan", $data["bulanData"])->get()
            ];

            DB::commit();

            return view("layouts.admin.pages.transaksi", $data);

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard");
        }
    }

    public function filter(Request $request)
    {
        try {

            DB::beginTransaction();

            $transaction = PaymentTransaction::whereMonth("tanggal_pesan", $request->bulan)->get();

            DB::commit();

            return redirect()->to("/transaksi")->with(["success" => "Data Berhasil di Filter", "bulan" => $request->bulan, "transaction" => $transaction]);

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard");
        }
    }

    public function downloadPDF($bulan)
    {
        try {

            DB::beginTransaction();

            $bulanData = date($bulan);

            $carbonBulan = Carbon::createFromFormat('m', str_pad($bulan, 2, '0', STR_PAD_LEFT));
            $formattedBulan = $carbonBulan->format('m');

            $carbonBulan->locale('id');
            $namaBulan = $carbonBulan->translatedFormat('F');

            $transaction = PaymentTransaction::whereMonth("tanggal_pesan", $formattedBulan)
                ->get();

            $pdf = PDF::loadView("layouts.admin.pages.pdf", ["transaction" => $transaction, "namaBulan" => $namaBulan])->setPaper("a3");

            DB::commit();

            return $pdf->download("Laporan_Transaksi_Bulan_" . $namaBulan . ".pdf");

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->to("/dashboard");
        }
    }
}

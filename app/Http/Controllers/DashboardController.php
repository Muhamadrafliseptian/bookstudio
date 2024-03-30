<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransaction;
use App\Models\Saran;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAdmin = User::where('level', 0)->count();
        $totalUser = User::where('level', 1)->count();
        $totalSaran = Saran::get()->count();
        $userData = User::where('level', 1)->take(1)->latest()->get();
        $adminData = User::where('level', 0)->take(1)->latest()->get();
        $saranData = Saran::latest()->get();
        $dataPesan = PaymentTransaction::get();

        foreach ($saranData as $saran) {
            $saran->created_at = Carbon::parse($saran->created_at)->setTimezone('Asia/Jakarta');
        }

        return view('layouts.admin.pages.index', [
            'totalAdmin' => $totalAdmin,
            'totalUser' => $totalUser,
            'userData' => $userData,
            'adminData' => $adminData,
            'saranData' => $saranData,
            'totalSaran' => $totalSaran,
            "dataPesan" => $dataPesan
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
    public function showPayment()
    {
        $dataPesan = PaymentTransaction::get();
        return view('layouts.admin.pages.index', [
            "dataPesan" => $dataPesan
        ]);
    }
}

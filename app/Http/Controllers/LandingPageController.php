<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Paket;
use App\Models\PaymentTransaction;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $paketData = Paket::get();
        return view('layouts.user.pages.index', [
            "paketData" => $paketData
        ]);
    }
    public function galeri()
    {
        return view('layouts.user.pages.galeri');
    }
    public function sendSaran(Request $request)
    {
        Saran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi_saran' => $request->isi_saran,
        ]);

        return view('layouts.user.pages.index');
    }
    public function detailPaket($id)
    {
        return DB::transaction(function () use ($id) {
            $data["detail"] = Paket::where("id_paket", $id)->first();
            $dataFasilitas["dataFasilitas"] = Fasilitas::get();
            return view('layouts.user.pages.detail-paket', $data, $dataFasilitas);
        });
    }
    public function historyBooking()
    {
        $user = Auth::user();
        $history = PaymentTransaction::where('user_id', $user->id)->get();

        return view('layouts.user.pages.index-history', ['history' => $history]);
    }
}

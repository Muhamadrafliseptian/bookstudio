<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    public function index()
    {
        $dataFasilitas = Fasilitas::get();
        return view('layouts.admin.pages.index-fasilitas', ["dataFasilitas" => $dataFasilitas]);
    }
    public function show($id)
    {
        $detail = Fasilitas::where("id_fasilitas", $id)->first();
        return view('layouts.admin.pages.edit-fasilitas', [
            "detail" => $detail
        ]);
    }
    public function destroy($id)
    {
        return DB::transaction(function() use ($id) {
            Fasilitas::where("id_fasilitas", $id)->delete();

            return back();
        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/'); 
        }
        return view('layouts.user.pages.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|string|min:8',
        ]);
        $existingUser = User::where('email', $request->email)->orWhere('no_hp', $request->no_hp)->first();

        if ($existingUser) {
            return back()->withInput()->withErrors(['email' => 'Email atau nomor hp sudah terdaftar']);
        }
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'level' => '1',
            'password' => Hash::make($request->password),
        ]);

        return redirect('/auth/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function loginForm()
    {
        if (Auth::check()) {
            return redirect('/'); 
        }
        return view('layouts.user.pages.login');
    }

    public function login(Request $request)
    {
        $cek = User::where("email", $request->email)->first();

        if ($cek) {
            if (Hash::check($request->password, $cek->password)) {
                if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                    $request->session()->regenerate();
                    $request->session()->put('level', $cek->level);
                    $request->session()->put('username', $cek->nama);
                    echo ($request->session()->put('username', $cek->nama));
                    if ($cek->level == 0) {
                        return redirect('/dashboard');
                    } else if ($cek->level == 1) {
                        return redirect('/');
                    }
                }
            } else {
                return back()->with("message", "Password Anda Salah")->withInput();
            }
        } else {
            $alertMessage = "Email Tidak Terdaftar";
            return view('layouts.user.pages.login')->with('alertMessage', $alertMessage);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('username');
        return redirect('/auth/login');
    }
}

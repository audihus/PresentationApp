<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('refreshToken')) {
            return redirect()->route('masterTutorial.index');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //panggil API eksternal
        $response = Http::post('https://jwt-auth-eight-neon.vercel.app/login',[
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($response->successful()){
            $token = $response->json()['refreshToken'];

            $matkulResponse =  Http::withToken($token)->get('https://jwt-auth-eight-neon.vercel.app/getMakul');

            if($matkulResponse->successful()){
                $matkul = $matkulResponse->json()['data'];

                session([
                        'refreshToken' => $token,
                        'matkul' => $matkul,
                        'email' => $request->email
                        ]);

                return redirect()->route('masterTutorial.index');
            }else{
                return back()->withErrors(['matkul' => 'Gagal mengambil data mata kuliah']);
            }
        }
        return back()->withErrors(['email' => 'Login gagal!']);
    }

    public function logout()
    {
        session()->forget('refreshToken');
        session()->forget('matkul');
        session()->forget('email');
        return redirect()->route('login');
    }
}

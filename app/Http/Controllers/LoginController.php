<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login(){

        return view('login');
    }

    public function cek_login(Request $request){
        
        //validasi form
        $credentials = $request->validate([
            'username' => ['required', 'exists:users,username'],
            'password' => ['required'],
        ]);
        
        //cek jika data ada atau tidak dan disimpan ke dalam session
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            $level=Auth::user()->role;

            if($level == 'admin') {
                return redirect()->intended('/dashboard');
            }elseif($level == 'petugas') {
                return redirect()->intended('/dashboard');
            }elseif($level == 'pengguna') {
                return redirect()->intended('/home');
            }else{
                session()->flash('error', 'Username atau Password Salah. Silakan coba lagi.');
            }
        } 
        
        return back()->withErrors([
            'username' => 'Username tidak terdaftar',
            'password' => 'Password Salah',
            ])->onlyInput('username');
        }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/home');
}
    public function regist(Request $request){
    return view('/login');
}
}

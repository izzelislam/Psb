<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $data=$request->only('email','password');

        if (Auth::attempt($data)) {
            $role=User::where('email','=',$request->email)->get();
            $role=$role->pluck('role')->first();

            if ($role == 'admin') {
                return redirect()->route('dashboard');            
            }else{
                return redirect()->route('dashboard-user');
            }
        }else{
            return redirect()->route('login')->with('gagal','email atau password salah.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'pendaftar'
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

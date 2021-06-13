<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
        return view('auth.emailPassword');
    }

    public function postEmail(Request $request)
    {   
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        
        $token = bin2hex(random_bytes(40));
        $user = [
            'email' => $request->email,
            'token' => $token,
        ];

        // dd($user['token']);
        DB::table('password_resets')->insert($user);

        Mail::to($user['email'])->send(new VerifikasiEmail($user));

        return back()->with('sukses-buat', 'link reset Password sudah kami kirim ke alamat email anda!');
    }

    public function getPassword($token)
    {
        return  view('auth.resetPassword', compact('token'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|max:20'
        ]);

        $validateToken = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        //dd($validateToken);
        if (!$validateToken) {
            return back()->withInput()->with('error', 'Invalid token!');
        }else {
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password)
            ]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect('/login')->with('sukses-daftar', 'Password anda sudah berhasil di update!'); 
        }
    }
}

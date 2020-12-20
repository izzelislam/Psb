<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Biodata1;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

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
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'pendaftar'
        ]);

        $no_wa=$request->get('no_wa');
        $no=str_split($no_wa,3);
        $tanggal=$request->get('umur');
        $umur=Carbon::parse($tanggal)->age;
        
        if ($no[0] == "+62") {
            $no1=array(0=>"08");
            $wa1=array_replace($no,$no1);
            $wa=implode("",$wa1);

        }else{
            $wa=$no_wa;
        }
        
        $TahunAjaran=TahunAjaran::where('status','=','aktif')->orderBy('id','desc')->pluck('id');
        
        Biodata1::create([
            'users_id'=>$user->id,
            'tahun_ajaran_id'=>$TahunAjaran->first(),
            'nama'=>$request->nama,
            'keluarga'=>$request->keluarga,
            'umur'=>$umur,
            'tanggal_lahir'=>$tanggal,
            'no_wa'=>$wa,
            'jenis_kelamin'=>$request->jenis_kelamin,
        ]);

        return redirect()->back()->with('sukses-buat','Selamat anda berhasil mendaftar, silahkan masuk untuk memulai mengikuti tes.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}

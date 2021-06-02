<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Mail\VerifikasiEmail;
use App\Models\Biodata1;
use App\Models\Biodata2;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
            $role_user=User::where('email','=',$request->email)->get();
            $role=$role_user->pluck('role')->first();

            $user_id = $role_user->pluck('id')->first();
            // $biodata_2 = Biodata2::where('id' ==)

            if ($role == 'admin') {
                return redirect()->route('dashboard');            
            }else{
                // if (Auth::user()->email_verified_at == null) {
                //     Auth::logout();
                //     return redirect()->route('login')->with('sukses-warning','Email anda belum terverifikasi, Silahkan Verifikasi email terlebih dahulu!');
                // }
                $bio = Biodata2::where('users_id','=',$user_id)->get();
                $user_bio = $bio->toArray();
                //dd($user_bio);
                if ( count($user_bio) > 0) {
                    return redirect()->route('dashboard-user');
                }else{
                    // return redirect()->back();
                    return redirect()->route('dashboard-user')->with('gagal_tes','hello');
                }
            }
        }else{
            return redirect()->route('login')->with('sukses-danger','email atau password salah.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(AuthRequest $request)
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
        
        // kirim email untuk verifikasi
        // VerifyUser::create([
        //   'users_id' => $user->id,
        //   'token' => bin2hex(random_bytes(40))
        // ]);
        // Mail::to('bangfkr002@gmail.com')->send(new VerifikasiEmail($user));
        // return redirect()->back();

        return redirect('/login')->with('sukses-daftar','Selamat anda berhasil mendaftar, silahkan login untuk memulai pendaftaran !');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }

}

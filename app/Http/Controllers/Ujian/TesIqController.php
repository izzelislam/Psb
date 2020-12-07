<?php

namespace App\Http\Controllers\Ujian;

use App\Http\Controllers\Controller;
use App\Models\Kepribadian;
use App\Models\Quis;
use App\Models\Soal;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesIqController extends Controller
{
    public function iq()
    {
        $soal_iq=Soal::all()->random(50)->chunk(10);
        return view('front.ujian.tes-iq',compact('soal_iq'));
    }

    public function iqstore(Request $request)
    {   
        $jawaban=$request->input('pilihan');
        $tahun_ajaran=TahunAjaran::where('status','=','aktif')->orderBy('id','desc')->pluck('id')->first();
        
        if($jawaban != null){
            $jawaban_benar=null;
            $jawaban_salah=null;

            foreach ($jawaban as $key => $value) {
                $cek=Soal::where('id','=',$key)->where('kunci_jawaban','=',$value)->get();
                $benar=count($cek);
                
                if($benar){
                    $jawaban_benar++;
                }else{
                    $jawaban_salah++;
                }
            }

            $nilai=$jawaban_benar*2;

            Quis::create([
                'users_id'=>Auth::user()->id,
                'tahun_ajaran_id'=>$tahun_ajaran,
                'nilai_tes_iq'=>$nilai,
                'nilai_tes_kepribadian'=>0,
            ]);
            return redirect()->route('tahap-ketiga-kepribadian');
        }else{
            Quis::create([
                'users_id'=>Auth::user()->id,
                'tahun_ajaran_id'=>$tahun_ajaran,
                'nilai_tes_iq'=>0,
                'nilai_tes_kepribadian'=>0,
            ]);
            return redirect()->route('tahap-ketiga-kepribadian');
        } 
            
    }

    public function kepribadian()
    {
        $kepribadian=Kepribadian::all()->random(50)->chunk(10);
        return view('front.ujian.tes-kepribadian',compact('kepribadian'));
    }

    public function kepribadianstore(Request $request)
    {
        $jawaban=$request->input('pilihan');
        
        if($jawaban != null){
            $jawaban_benar=null;
            $jawaban_salah=null;

            foreach ($jawaban as $key => $value) {
                $cek=Kepribadian::where('id','=',$key)->where('kunci_jawaban','=',$value)->get();
                $benar=count($cek);
                
                if($benar){
                    $jawaban_benar++;
                }else{
                    $jawaban_salah++;
                }
            }

            $nilai_tes=$jawaban_benar*20;

            $data=Quis::where('users_id','=',Auth::user()->id)->pluck('id')->first();
            $nilai=Quis::find($data); 
            $nilai->update(['nilai_tes_kepribadian'=>$nilai_tes]);     
            return redirect()->route('sukses');
        }
    }
}

// $jawaban=$request->input('pilihan');
        
//         $jawaban_a=null;
//         $jawaban_b=null;
//         $jawaban_c=null;
//         $jawaban_d=null;
//         $jawaban_e=null;

//         foreach ($jawaban as $value) {
//             if ($value == 'a') {
//                 $jawaban_a++;
//             }elseif($value == 'b'){
//                 $jawaban_b++;
//             }elseif($value == 'c'){
//                 $jawaban_c++;
//             }elseif($value == 'd'){
//                 $jawaban_d++;
//             }elseif($value == 'e'){
//                 $jawaban_e++;
//             }
//         }

//        $a=$jawaban_a*30;
//        $b=$jawaban_b*20;
//        $c=$jawaban_c*15;
//        $d=$jawaban_d*10;
//        $e=$jawaban_e*5;

//        $total=$a+$b+$c+$d+$e;

//        $data=Quis::where('users_id','=',Auth::user()->id)->pluck('id')->first();
//        $nilai=Quis::find($data); 
//        $nilai->update(['nilai_tes_kepribadian'=>$total]);     
//        return redirect()->route('sukses');
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
       // dd($soal_iq);
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
            
            
            $nilai = 0 ;
            foreach ($jawaban as $key => $value) {
                $cek=Kepribadian::where('id','=',$key)->first();
                
                if ($value == 'a') {
                    $nilai= $nilai + $cek->poin_a;
                }
                elseif ($value == 'b') {
                    $nilai= $nilai + $cek->poin_b;
                }
                elseif ($value == 'c') {
                    $nilai= $nilai + $cek->poin_c;
                }
                elseif ($value == 'd') {
                    $nilai= $nilai + $cek->poin_d;
                }
                elseif ($value == 'e') {
                    $nilai= $nilai + $cek->poin_e;
                }  
            }
            
            $data=Quis::where('users_id','=',Auth::user()->id)->pluck('id')->first();
            $nilai_kepribadian=Quis::find($data); 
            $nilai_kepribadian->update(['nilai_tes_kepribadian'=>$nilai]);     
            return redirect()->route('sukses');
        }
    }
}
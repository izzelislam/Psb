<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TesIqImport; 

class SoalTesIqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soaliq=Soal::orderBy('created_at','desc')->get();
        return view('admin.tesiq.index',compact('soaliq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tesiq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'soal'=>'required',
            'a'=>'required',
            'b'=>'required',
            'c'=>'required',
            'd'=>'required',
            'e'=>'required',
            'kunci_jawaban'=>'required',
        ]);
        Soal::create([
            'gambar'=>$request->file('gambar')->store('img','public'),
            'soal'=>$request->soal,
            'a'=>$request->a,
            'b'=>$request->b,
            'c'=>$request->c,
            'd'=>$request->d,
            'e'=>$request->e,
            'kunci_jawaban'=>$request->kunci_jawaban,
        ]);
        return redirect()->route('soal-tes-iq.index')->with('sukses-buat','Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soal=Soal::find($id);
        return view('admin.tesiq.detail',compact('soal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Soal::find($id);
        return view('admin.tesiq.create',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'soal'=>'required',
            'a'=>'required',
            'b'=>'required',
            'c'=>'required',
            'd'=>'required',
            'e'=>'required',
            'kunci_jawaban'=>'required',
        ]);

        $data=Soal::find($id);
        if($request->file('gambar') != null){
            $gambar=$request->file('gambar')->store('img','public');         
        }else{
            $gambar=$data->gambar;
        }

        $data->update([
            'gambar'=>$gambar,
            'soal'=>$request->soal,
            'a'=>$request->a,
            'b'=>$request->b,
            'c'=>$request->c,
            'e'=>$request->d,
            'd'=>$request->e,
            'kunci_jawaban'=>$request->kunci_jawaban,
        ]);

        return redirect()->route('soal-tes-iq.index')->with('sukses-buat','Data Berhasil Di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal=Soal::find($id);
        Storage::delete('img/'.$soal->gambar);
        $soal->delete();
        return redirect()->back()->with('sukses-hapus','Data Berhasil Di Hapus');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
                Soal::find($id)->delete();
            }
            return redirect()->back()->with('sukses-hapus','Data Berhasil Di Hapus');
        }else{
            return redirect()->back();
        }
    }

    public function modalimport()
    {
        return view('admin.tesiq.edit');
    }

    public function importsoaliq(Request $request)
    {
        Excel::import(new TesIqImport, $request->file('soal'));
        return redirect()->route('soal-tes-iq.index')->with('sukses-buat','File Berhasil Di Import');
    }
}

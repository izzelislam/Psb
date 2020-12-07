<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kepribadian;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SoalKepribadianImport; 

class SoalTesKepribadianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepribadian=Kepribadian::orderBy('created_at','desc')->get();
        return view('admin.teskepribadian.index',compact('kepribadian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teskepribadian.create');
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
            'kunci_jawaban'=>'required'
        ]);
        Kepribadian::create($request->all());
        return redirect()->route('soal-tes-kepribadian.index')->with('sukses-buat','Soal Berhasil Di Buat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soal=Kepribadian::find($id);
        return view('admin.teskepribadian.detail',compact('soal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Kepribadian::find($id);
        return view('admin.teskepribadian.create',compact('data'));
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
            'kunci_jawaban'=>'required'
        ]);
        Kepribadian::find($id)->update($request->all());
        return redirect()->route('soal-tes-kepribadian.index')->with('sukses-buat','Soal-Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kepribadian::find($id)->delete();

        return redirect()->route('soal-tes-kepribadian.index')->with('hapus','Data Berhasil DI Hapus .');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Kepribadian::find($id)->delete();
            }

            return redirect()->route('soal-tes-kepribadian.index')->with('hapus','Data Berhasil DI Hapus .');;
        }else{
            return redirect()->back();
        }
        
    }

    public function downloadtemplate()
    {
        $template="./storage/Download/template-import-soal-tes-kepribadian.csv";
        return FacadeResponse::download($template);
    }

    public function modalimport()
    {
        return view('admin.teskepribadian.edit');
    }

    public function importsoal(Request $request)
    {
        Excel::import(new SoalKepribadianImport, $request->file('soal'));
        return redirect()->route('soal-tes-kepribadian.index')->with('sukses-buat','File Berhasil Di Import');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajaran=TahunAjaran::orderBy('created_at','desc')->get();
        return view('admin.tahunajaran.index',compact('tahunajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tahunajaran.create');
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
            'tahun'=>'required',
            'gelombang'=>'required',
            'status'=>'required'
        ]);
        TahunAjaran::create($request->all());
        return redirect()->route('tahun-ajaran.index')->with('sukses-buat','data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=TahunAjaran::find($id);
        return view('admin.tahunajaran.create',compact('data'));
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
            'tahun'=>'required',
            'gelombang'=>'required',
            'status'=>'required'
        ]);
        $data=TahunAjaran::find($id);
        $data->update($request->all());

        return redirect()->route('tahun-ajaran.index')->with('sukses-buat','Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=TahunAjaran::find($id);
        $data->delete();

        return redirect()->route('tahun-ajaran.index')->with('sukses-hapus','Data Berhasil DI Hapus.');
    }

    public function aktif($id)  
    {
        $data=TahunAjaran::find($id);
        $data->update(['status'=>'aktif']);
        return redirect()->route('tahun-ajaran.index')->with('sukses-aktif','Berhasil Di Aktifkan');
    }

    public function nonaktif($id)  
    {
        $data=TahunAjaran::find($id);
        $data->update(['status'=>'tidak-aktif']);
        return redirect()->route('tahun-ajaran.index')->with('sukses-nonaktif','Berhasil Di Non Aktifkan');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids == null) {
            return redirect()->back();
        }else{
            foreach ($ids as $id) {
                TahunAjaran::find($id)->delete();
            }

            return redirect()->route('tahun-ajaran.index')->with('sukses-hapus','Data Berhasil DI Hapus.');
        }
    }

    public function aktifall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id ) {
                TahunAjaran::find($id)->update(['status'=>'aktif']);
            }
            return redirect()->route('tahun-ajaran.index')->with('sukses-aktif','Berhasil Di Aktifkan');
        }else{
            return redirect()->back();
        }
    }

    public function nonaktifall(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id ) {
                TahunAjaran::find($id)->update(['status'=>'tidak-aktif']);
            }
            return redirect()->route('tahun-ajaran.index')->with('sukses-nonaktif','Berhasil Di Non Aktifkan');
        }else{
            return redirect()->back();
        }
    }
    
}

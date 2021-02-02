<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal=Jadwal::orderBy('created_at','desc')->orderBy('created_at','desc')->get();
        return view('admin.jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create');
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
            'title'=>'required',
            'isi'=>'required'
        ]);
        
         if ($request->file('gambar') !== null ) {
            $gambar = $request->file('gambar')->store('img','public');
        }else{
            $gambar=null;
        }

        Jadwal::create([
            'gambar' => $gambar,
            'title' => $request->title,
            'isi' => $request->isi
        ]);
        return redirect()->route('informasi.index')->with('sukses-buat','Data Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi= Jadwal::find($id);
        return view('admin.jadwal.info_detail', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Jadwal::find($id);
        return view('admin.jadwal.create',compact('data'));
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
            'title'=>'required',
            'isi'=>'required'
        ]);

        $data=Jadwal::find($id);

        if($request->file('gambar') != null){
            $gambar=$request->file('gambar')->store('img','public');         
        }else{
            $gambar=$data->gambar;
        }

        $data->update([
            'gambar' => $gambar,
            'title' => $request->title,
            'isi' => $request->isi
        ]);
        return redirect()->route('informasi.index')->with('sukses-edit','Data Berhasil Di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Jadwal::find($id);
        Storage::delete('img/'.$data->gambar);
        $data->delete();

        return redirect()->route('informasi.index')->with('sukses-hapus','Data Berhasil DI Hapus.');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Jadwal::find($id)->delete();
            }
            return redirect()->route('informasi.index')->with('sukses-hapus','Data Berhasil DI Hapus.');
        }else{
            return redirect()->back();
        }
    }
}

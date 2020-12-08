<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal=Jadwal::orderBy('created_at','desc')->get();
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
            'nama_kegiatan'=>'required',
            'tanggal'=>'required'
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('sukses-buat','Data Berhasil Di Buat');
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
            'nama_kegiatan'=>'required',
            'tanggal'=>'required'
        ]);
        $data=Jadwal::find($id);
        $data->update($request->all());
        return redirect()->route('jadwal.index')->with('sukses-edit','Data Berhasil Di Edit.');
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
        $data->delete();

        return redirect()->route('jadwal.index')->with('sukses-hapus','Data Berhasil DI Hapus.');
    }

    public function hapusall(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Jadwal::find($id)->delete();
            }
            return redirect()->route('jadwal.index')->with('sukses-hapus','Data Berhasil DI Hapus.');
        }else{
            return redirect()->back();
        }
    }
}
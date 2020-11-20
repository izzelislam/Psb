<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qna;
use Illuminate\Http\Request;

class QnaController extends Controller
{
    public function index()
    {
        $qna=Qna::orderBy('created_at','Desc')->get();
        return view('admin.qna.index',compact('qna'));
    }

    public function create()
    {
        return view('admin.qna.create');
    }

    public function edit($id)
    {
        $data=Qna::find($id);
        return view('admin.qna.create',compact('data'));
    }

    public function store(Request $request)
    {
        Qna::create($request->all());
        return redirect()->route('qna.index')->with('sukses-buat','Data Berhasil Di Buat .');
    }

    public function update(Request $request,$id)        
    {
        $data=Qna::find($id);
        $data->update($request->all());

        return redirect()->route('qna.index')->with('sukses-edit','data berhasil update.');
    }

    public function destroy($id)
    {
        $data = Qna::find($id);
        $data->delete();

        return redirect()->back()->with('sukses-hapus','data berhasil di hapus');
    }
}

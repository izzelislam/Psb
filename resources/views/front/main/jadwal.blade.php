@extends('front.main.pages.app')
@section('title','Question & Answer')
@section('content')
    <div class="container py-5">
      <div class="my-4 title">
        <h5><strong>Jadwal Kegiatan & Penerimaan Santri Baru</strong></h5>
        <div class="row">
          <div class="col-md-10">
            <table class="table table-bordered mt-4 title">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kegiatan</th>
                  <th scope="col">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $item)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="{{ $item->tanggal > date('now') ? 'text-muted' : '' }}">{{ $item->nama_kegiatan }}</td>
                    <td class="{{ $item->tanggal > date('now') ? 'text-muted' : '' }}">{{ $item->tanggal }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div>
@endsection
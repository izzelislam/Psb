@extends('front.dashboard.pages.app')

@section('title','informasi')

@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
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
                @if ($jadwal->count() > 0)
                    @foreach ($jadwal as $item)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="{{ $item->tanggal < date('Y-m-d') ? 'text-danger' : 'font-weight-bold' }}">{{ $item->nama_kegiatan }}</td>
                        <td class="{{ $item->tanggal < date('Y-m-d') ? 'text-danger' : 'font-weight-bold' }}">{{ $item->tanggal }}</td>
                      </tr>
                    @endforeach
                @else
                     <tr>
                       <td colspan="3">
                         <small class="text-danger">tidak ada data yang ditampilkan.</small>
                       </td>
                     </tr>
                @endif
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
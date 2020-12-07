@php
    $action='';
    if (isset($data)) {
      $action="/admin/jadwal/{$data->id} ";
    }else{
      $action="/admin/jadwal";
    }

    $cek=isset($data);
@endphp

@push('end-style')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">
@endpush
<div class="container">
  <h6>{{ $cek ? 'Edit' :'Buat' }} data Q&A</h6>
</div>
<form action={{ $action }} method="POST">
  @csrf
  @if ($cek)
      @method('PUT')
  @endif
  <div class="card-body">
    
    <div class="form-group">
      <label>Nama Kegiatan</label>
      <div class="input-group">
        <input type="text" name="nama_kegiatan" class="form-control phone-number" value="{{ $cek ? $data->nama_kegiatan :'' }}">
      </div>
    </div>

    <div class="form-group">
      <label>Tanggal</label>
      <div class="input-group">
        <input type="date" name="tanggal" class="form-control phone-number" value="{{ $cek ? $data->tanggal :'' }}">
      </div>
    </div>

    <div class="form-group">
      <label>Penanggung Jawab Kegiatan</label>
      <div class="input-group">
        <input type="text" name="penaggung_jawab" class="form-control phone-number" value="{{ $cek ? $data->penaggung_jawab :'' }}">
      </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
  </div>
</form>
@push('end-script')
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
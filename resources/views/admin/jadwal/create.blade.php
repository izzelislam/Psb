@php
    $action='';
    if (isset($data)) {
      $action="/admin/jadwal/{$data->id} ";
    }else{
      $action="/admin/jadwal";
    }

    $cek=isset($data);
@endphp

@extends('admin.pages.app')

@section('title','Data Jadwal Kegiatan')

@section('title-page','Buat Jadwal Kegiatan')

@push('end-style')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">JadwalKegiatan</a></div>
        <div class="breadcrumb-item">Buata Data</div>
    </div>
@endsection

@section('content')
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ $cek ? 'Edit' :'Buat' }} data q&a</h4>
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
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-lemon"></i>
                              </div>
                            </div>
                            <input type="text" name="nama_kegiatan" class="form-control phone-number" value="{{ $cek ? $data->nama_kegiatan :'' }}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Tanggal</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="date" name="tanggal" class="form-control phone-number" value="{{ $cek ? $data->tanggal :'' }}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Penanggung Jawab Kegiatan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input type="text" name="penaggung_jawab" class="form-control phone-number" value="{{ $cek ? $data->penaggung_jawab :'' }}">
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
@endsection

@push('end-script')
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
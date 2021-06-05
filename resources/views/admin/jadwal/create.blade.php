@php
    $action='';
    if (isset($data)) {
      $action="/admin/informasi/{$data->id} ";
    }else{
      $action="/admin/informasi";
    }

    $cek=isset($data);
@endphp
@extends('admin.pages.app')

@push('end-style')
<link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
@endpush

@section('title','Buat Informasi')

@section('title-page','Buat Informasi')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">informasi</a></div>
        <div class="breadcrumb-item">Buat</div>
    </div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      @php
        $action='';
        if (isset($data)) {
          $action="/admin/informasi/{$data->id} ";
        }else{
          $action="/admin/informasi";
        }

        $cek=isset($data);
      @endphp
      <form action={{ $action }} method="POST" enctype="multipart/form-data">
        @csrf
        @if ($cek)
            @method('PUT')
        @endif
        <div class="card-body">
          <div class="form-group">
            <h6>Gambar</h6>
            <div class="col-sm-6">
              <img src="{{ $cek ?  Storage::url($data->gambar) : url('https://placehold.it/100x100') }}" id="preview" class="img-thumbnail" style="width: 200px;height:200pxpx;">
            </div>
            <input type="file" name="gambar" class="file d-none" accept="image/*">
            <div class="input-group my-3">
              <input type="text" class="form-control col-sm-2 ml-3" disabled placeholder="Upload File" id="file">
              <div class="input-group-append">
                <button type="button" class="browse btn btn-primary">Browse...</button>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Judul</label>
            <div class="input-group" style="width: 84%">
              <input type="text" name="title" class="form-control phone-number " value="{{ $cek ? $data->title :'' }}">
            </div>
          </div>
          <div class="form-group">
            <label>isi</label>
            <div class="input-group">
              <textarea name="isi" class="summernote">
                {{ $cek ? $data->isi :'' }}
              </textarea>
            </div>
          </div>
      
          <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
        </div>
      </form>

      {{-- <div class="card-header">
        <div id="summernote"><p>Hello Summernote</p></div>
      </div> --}}

    </div>
  </div>
</div>
@endsection


@push('end-script')
<script src="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('stisla/node_modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('stisla/node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
<script>
  $(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
  });
  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
</script>
@endpush


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
<!-- include libraries(jQuery, bootstrap) -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

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
            <div class="input-group">
              <input type="text" name="title" class="form-control phone-number" value="{{ $cek ? $data->title :'' }}">
            </div>
          </div>
          <div class="form-group">
            <label>isi</label>
            <div class="input-group">
             <textarea name="isi" id="summernote" style="height: 250px;">
              {{-- {{ $cek ? $data->isi :'' }} --}}
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $(document).ready(function() {
      $('#summernote').summernote({
        tabsize: 2,
        width: '100%',
        height: 400,
        
      });
  });
</script>
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


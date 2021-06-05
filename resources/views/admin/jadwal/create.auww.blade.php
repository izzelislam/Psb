@php
    $action='';
    if (isset($data)) {
      $action="/admin/informasi/{$data->id} ";
    }else{
      $action="/admin/informasi";
    }

    $cek=isset($data);
@endphp

<!-- include libraries(jQuery, bootstrap) -->


{{-- @include('admin.layouts.style') --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">

<div class="container">
  <h6>{{ $cek ? 'Edit' :'Buat' }} data Q&A</h6>
</div>
<form action={{ $action }} method="POST" enctype="multipart/form-data">
  @csrf
  @if ($cek)
      @method('PUT')
  @endif
  <div class="card-body">
    <div class="form-group overflow-auto">
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
        <input type="text" name="title"  class="form-control phone-number w-50" value="{{ $cek ? $data->title :'' }}">
      </div>
    </div>
    <div class="form-group">
      <label>isi</label>
      <div class="form-group row mb-4">
        <div class="col-sm-12 col-md-12">
          <textarea class="summernote">
            {{ $cek ? $data->isi :'' }}
          </textarea>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
  </div>
</form>

{{-- @include('admin.layouts.script') --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('stisla/node_modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('stisla/node_modules/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

<script>
 $(document).ready(function() {
  $('#summernote').summernote({
    height: '100px',
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

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

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
      <div class="input-group overflow-auto">
       <textarea name="isi" id="summernote" style="heiwidthght: 100%;">
        {{ $cek ? $data->isi :'' }}
       </textarea>
      </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
  </div>
</form>

{{-- @include('admin.layouts.script') --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
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

@php
    $action='';
    if (isset($data)) {
      $action="/admin/soal-tes-iq/{$data->id} ";
    }else{
      $action="/admin/soal-tes-iq";
    }

    $cek=isset($data);
@endphp

<link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="container">
      <h6>{{ $cek ? 'Edit' :'Buat' }} Soal Tes IQ</h6>
    </div>
    <form action={{ $action }} method="POST" enctype="multipart/form-data">
      @csrf
      @if ($cek)
          @method('PUT')
      @endif
      <div class="card-body">
        
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <h6>Soal</h6>
              <div class="input-group">
                <textarea style="height: 150px;" name="soal" class="form-control">
                  {{ $cek ? $data->soal :'' }}
                </textarea>
              </div>
            </div>
          </div>
          <div class="col-4">
             <div class="form-group">
              <h6>Gambar</h6>
              <div class="ml-2 col-sm-6">
                <img src="{{ $cek ?  Storage::url($data->gambar) :'https://placehold.it/100x100' }}" id="preview" class="img-thumbnail" style="width: 200px;height:200pxpx;">
              </div>
              <input type="file" name="gambar" class="file d-none" accept="image/*">
              <div class="input-group my-3">
                <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                <div class="input-group-append">
                  <button type="button" class="browse btn btn-primary">Browse...</button>
                </div>
              </div>
            </div>
          </div>
        </div>
          
        
        <table class="w-100" cellpadding="5" cellspacing="2">
          <tr>
            <th colspan="2">
              <h6>Jawaban</h6>
            </th>
            <th>
              <h6>Kunci Jawaban</h6>
            </th>
          </tr>
          {{-- A --}}
          <tr>
            <td>
              <strong> A .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="a" class="form-control"  value="{{ $cek ? $data->a :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="kunci_jawaban" value="a" {{ isset($data->a) ? 'checked' : ''  }} class="selectgroup-input">
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                </label>
              </div>
            </td>
          </tr>
          {{-- B --}}
          <tr>
            <td>
              <strong> B .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="b" class="form-control"  value="{{ $cek ? $data->b :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="kunci_jawaban" value="b" {{ isset($data->b) ? 'checked' : ''  }} class="selectgroup-input">
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                </label>
              </div>
            </td>
          </tr>
          {{-- c --}}
          <tr>
            <td>
              <strong> C .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="c" class="form-control"  value="{{ $cek ? $data->c :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="kunci_jawaban" value="c"  {{ isset($data->c) ? 'checked' : ''  }} class="selectgroup-input" >
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                </label>
              </div>
            </td>
          </tr>
          {{-- d --}}
          <tr>
            <td>
              <strong> D .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="d" class="form-control"  value="{{ $cek ? $data->d :'' }}">
              </input>
            </td>
            <td class="pl-5">
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="kunci_jawaban" value="d"  {{ isset($data->d) ? 'checked' : ''  }} class="selectgroup-input">
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                </label>
              </div>
            </td>
          </tr>
          {{-- e --}}
          <tr>
            <td>
              <strong> E .</strong>
            </td>
            <td>
              <input type="text" style="height: 50px;" name="e" class="form-control"  value="{{ $cek ? $data->e :''}}">
              </input>
            </td>
            <td class="pl-5">
              <div class="selectgroup selectgroup-pills">
                <label class="selectgroup-item">
                  <input type="radio" name="kunci_jawaban" value="e"  {{ isset($data->e) ? 'checked' : ''  }} class="selectgroup-input">
                  <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                </label>
              </div>
            </td>

          </tr>
        </table>
        
        <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left my-5"> <i class="fas fa-save"></i> Kirimkan</button>
      </div>
    </form>
</div>
</div>

<script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
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

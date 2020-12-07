@php
    $action='';
    if (isset($data)) {
      $action="/admin/soal-tes-kepribadian/{$data->id} ";
    }else{
      $action="/admin/soal-tes-kepribadian";
    }

    $cek=isset($data);
@endphp


<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="container">
      <h6>{{ $cek ? 'Edit' :'Buat' }} data tahun ajaran</h6>
    </div>
    <form action={{ $action }} method="POST">
      @csrf
      @if ($cek)
          @method('PUT')
      @endif
      <div class="card-body">

        <div class="form-group">
          <h6>Soal</h6>
          <div class="input-group">
            <textarea style="height: 100px;" name="soal" class="form-control">
              {{ $cek ? $data->soal :'' }}
            </textarea>
          </div>
        </div>
        
        <table class="w-100" cellpadding="10" cellspacing="10">
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
                  <input type="radio" name="kunci_jawaban" value="a"  {{ isset($data->a) ? 'checked' : ''  }} class="selectgroup-input" />
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
                  <input type="radio" name="kunci_jawaban" value="b"  {{ isset($data->b) ? 'checked' : ''  }} class="selectgroup-input" />
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
                  <input type="radio" name="kunci_jawaban" value="c"  {{ isset($data->c) ? 'checked' : ''  }} class="selectgroup-input" />
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
                  <input type="radio" name="kunci_jawaban" value="d"  {{ isset($data->d) ? 'checked' : ''  }} class="selectgroup-input" />
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
                  <input type="radio" name="kunci_jawaban" value="e"  {{ isset($data->e) ? 'checked' : ''  }} class="selectgroup-input" />
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

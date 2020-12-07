@php
    $action='';
    if (isset($data)) {
      $action="/admin/qna/{$data->id} ";
    }else{
      $action="/admin/qna";
    }

    $cek=isset($data);
@endphp


@push('end-style')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">
@endpush
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
                <label>Pertanyaan</label>
                <div class="input-group">
                  <textarea name="pertanyaan" class="form-control" style="height: 150px;">
                    {{ $cek ? $data->pertanyaan :'' }}
                  </textarea>
                </div>
              </div>

              <div class="form-group">
                <label>Jawaban</label>
                <div class="input-group">
                  <textarea name="jawaban" class="form-control" style="height: 250px;">
                    {{ $cek ? $data->jawaban :'' }}
                  </textarea>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
            </div>
          </form>
      </div>
    </div>
  </div>
@push('end-script')
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
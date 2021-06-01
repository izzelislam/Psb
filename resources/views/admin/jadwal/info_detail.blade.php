
@push('end-style')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">
@endpush
<div class="card mb-3">
  @if ($informasi->gambar != null)
    <img src="{{ Storage::url($informasi->gambar) }}" class="card-img-top" alt="...">
  @endif
  <div class="card-body">
    <h5 class="card-title">{{ $informasi->title }}</h5>
    <p class="card-text">{!! $informasi->isi !!}</p>
    <p class="card-text"><small class="text-muted">{{ $informasi->created_at->format('Y-m-d') }}</small></p>
  </div>
</div>
@push('end-script')
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
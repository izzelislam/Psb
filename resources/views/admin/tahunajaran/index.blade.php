@extends('admin.pages.app')

@section('title','Data Tahun Ajaran')

@section('title-page','Data Tahun Ajaran')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Tahun Ajaran</a></div>
        <div class="breadcrumb-item">List</div>
    </div>
@endsection

@section('content')
<div class="row">
              <div class="col-12">

                {{-- feedback message --}}
                @if (session('sukses-buat'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-buat') }}
                      </div>
                    </div>
                @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Daftar data tahun ajaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3 justify-content-between">
                       <div class="col">
                           <div class="btn-group dropleft">
                                <a href="{{ route('tahun-ajaran.create') }}" class="btn .btn-icon .icon-left btn-info ml-2"> <i class="fas fa-plus"></i> Buat Data</a>
                            </div>
                       </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Gelomabang</th>
                            <th>Status</th>
                            <th style="width:270px;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tahunajaran as $item)
                          <tr>
                            <td width="10">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}">
                                <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td width="10">{{ $loop->iteration }}</td>
                            <td>
                              {{ $item->tahun }}
                            </td>
                            <td>{{ $item->gelombang }}</td>
                            <td>
                              @if ( $item->status == 'aktif')
                                  <span class="badge badge-success">aktif</span>
                              @else
                                  <span class="badge badge-danger">Tidak-Aktif</span>
                              @endif
                            </td>
                            
                            <td>
                              <form action="{{ route('tahun-ajaran.aktif',$item->id ) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-icon icon-left btn-sm"> <i class="fas fa-check "></i>Aktif</button>
                              </form>
                              <form action="{{ route('tahun-ajaran.nonaktif',$item->id ) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-warning btn-icon icon-left btn-sm"> <i class="fas fa-times "></i>Non Aktif</button>
                              </form>
                              <a
                                href="{{ route('tahun-ajaran.edit', $item->id) }}"
                                class="btn btn-info btn-icon icon-left btn-sm"> 
                                <i class="fas fa-edit"></i> Edit
                              </a>

                              <form action="{{ route('tahun-ajaran.destroy', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-icon icon-left btn-sm"> <i class="fas fa-times"></i> Hapus</button>
                              </form>
                            </td>
                          </tr>
        
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

@if (isset($data))
    @push('end-script')
    <script>
      $("#edit-data").fireModal({
        title:'Filter Data',
        body: `
         <h1>hello</h1>   
        `});
    </script>
@endpush
@endif

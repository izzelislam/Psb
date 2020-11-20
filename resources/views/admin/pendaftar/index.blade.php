@extends('admin.pages.app')

@section('title','Data Pendaftar')

@section('title-page','Data Pendaftar')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Pendaftar</a></div>
        <div class="breadcrumb-item">List</div>
    </div>
@endsection

@section('content')
<div class="row">
              <div class="col-12">
                {{-- feedback message --}}
                @if (session('hapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('hapus') }}
                      </div>
                    </div>
                @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Data Pendaftar</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3 justify-content-between">
                       <div class="col">
                           <div class="btn-group dropleft d-inline float-right">
                                <a href="{{ route('pendaftar-export') }}" class="btn btn-primary">
                                Export Excel
                                </a>
                                <button class="btn btn-info ml-2" id="filter">Filter</button>
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
                            <th>Nama</th>
                            <th>umur</th>
                            <th>Kondisi Keluarga</th>
                            <th>No Wa</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($biodata1 as $item)
                          <tr>
                            <td width="10">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}">
                                <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td width="10">{{ $loop->iteration }}</td>
                            <td>
                              {{ $item->nama }}
                            </td>
                            <td>
                              {{ $item->umur }} &nbsp; Tahun
                            </td>
                            <td>{{ $item->keluarga }}</td>
                            <td>{{ $item->no_wa }}</td>
                            <td>
                              <form action="{{ route('pendaftar-hapus', $item->id ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fas fa-trash"></i> delete</button>
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
@push('end-script')
    <script>
      $("#filter").fireModal({
        title:'Filter Data',
        body: `
          <form method="GET" action="{{ route('data-pendaftar') }}">

            <div class="form-group">
              <label for="exampleInputEmail1">Umur</label>
              <select name="umur" class="custom-select">
                <option selected value='null'>-- umur --</option>
                <option value="16">16 Tahun</option>
                <option value="17">17 Tahun</option>
                <option value="18">18 Tahun</option>
                <option value="19">19 Tahun</option>
                <option value="20">20 Tahun</option>
                <option value="21">21 Tahun</option>
              </select>
            </div>
          
            <div class="form-group">
              <label for="exampleInputEmail1">Kondisi Keluarga</label>
              <select name="keluarga" class="custom-select">
                <option selected value='null'>-- Kondisi Keluarga --</option>
                <option value="mampu">Keluarga Mampu</option>
                <option value="tidak-mampu">Keluarga Tidak-Mampu</option>
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Terapkan</button>
             
          </form>
                
        `});
    </script>
@endpush
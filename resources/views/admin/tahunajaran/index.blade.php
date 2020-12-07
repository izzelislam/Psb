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
                @elseif (session('sukses-aktif'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-aktif') }}
                      </div>
                    </div>
                @elseif (session('sukses-nonaktif'))
                    <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-nonaktif') }}
                      </div>
                    </div>
                @elseif (session('sukses-hapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-hapus') }}
                      </div>
                    </div>
                @else
                @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Daftar data tahun ajaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3 justify-content-between">
                        <div class="col">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi Masal
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" id="aktif1"> Aktif</a>
                            <a class="dropdown-item" id="nona1"> Tidak Aktif</a>
                            <a class="dropdown-item" id="del1"> Hapus</a>
                          </div>
                        <div class="btn-group d-inline float-right">
                            <a href="#mymodal"
                               data-toggle="modal"
                               data-target="#mymodal"
                               data-remote="{{ route('tahun-ajaran.create') }}" 
                               class="btn .btn-icon .icon-left btn-info ml-2"
                            > 
                               <i class="fas fa-plus"></i> 
                               Buat Data
                            </a>
                        </div>
                       </div>
                    </div>
                    <div class="table-responsive">
                      <form method="POST">
                        @csrf
                        <button class="d-none" formaction="{{ route('tahun-ajaran.hapus-all') }}" id="del2"></button>
                        <button class="d-none" formaction="{{ route('tahun-ajaran.aktif-all') }}" id="aktif2"></button>
                        <button class="d-none" formaction="{{ route('tahun-ajaran.nonaktif-all') }}" id="nona2"></button>
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
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}" name="ids[{{ $item->id }}]" value="{{ $item->id }}">
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
                                
                                <button formaction="{{ route('tahun-ajaran.aktif',$item->id ) }}" class="btn btn-success btn-icon icon-left btn-sm"> <i class="fas fa-check "></i>Aktif</button>
                              
                                <button formaction="{{ route('tahun-ajaran.nonaktif',$item->id ) }}" class="btn btn-warning btn-icon icon-left btn-sm"> <i class="fas fa-times "></i>Non Aktif</button>
                                
                                <a
                                  href="#mymodal"
                                  data-target="#mymodal"
                                  data-toggle="modal"
                                  data-remote="{{ route('tahun-ajaran.edit', $item->id) }}"
                                  class="btn btn-info btn-icon icon-left btn-sm"> 
                                  <i class="fas fa-edit"></i> Edit
                                </a>
  
                                <button formaction="{{ route('tahun-ajaran.hapus',$item->id) }}" class="btn btn-danger btn-icon icon-left btn-sm"> <i class="fas fa-times"></i> Hapus</button>
                              </td>
                            </tr>
          
                            @endforeach
                          </tbody>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection


@push('end-script')
    <script>
      $("#del1").click(function(){
        $("#del2").click();
      });
      $("#aktif1").click(function(){
        $("#aktif2").click();
      });
      $("#nona1").click(function(){
        $("#nona2").click();
      });
    </script>
    <script>
      jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
          var button = $(e.relatedTarget);
          var modal = $(this);

          modal.find('.modal-body').load(button.data('remote'));
          modal.find('.modal-title').html(button.data('title'));
        });
      });
    </script>
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <i class="fas fa-spiner fa-spin"></i>
          </div>
        </div>
      </div>
    </div>
@endpush


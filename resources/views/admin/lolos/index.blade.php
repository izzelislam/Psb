@extends('admin.pages.app')

@section('title','Data Calon Santri')

@section('title-page','Data Calon Santri')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Calon Santri</a></div>
        <div class="breadcrumb-item">List</div>
    </div>
@endsection

@section('content')
<div class="row">
              <div class="col-12">
                {{-- feedback message --}}
                @if (session('sukses-hapus'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-hapus') }}
                      </div>
                    </div>
                @elseif (session('sukses-edit'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ session('sukses-edit') }}
                      </div>
                    </div>
                @endif

                <div class="card">
                  <div class="card-header">
                    <h4>Data Calon Santri</h4>
                  </div>
                  <div class="card-body">
                      <div class="row mb-3 justify-content-between">
                      <div class="col">
                        <button class="btn btn-primary " id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                          Hapus Semua
                        </button>
                          <div class="btn-group dropleft d-inline float-right">
                              <a href="{{ route('lolos.export') }}" type="button" class="btn btn-primary">
                              Export Excel
                              </a>
                          </div>
                      </div>
                      </div>
                        <form method="POST">
                        @csrf
                        <button  formaction="{{ route('lolos-hapus.all') }}" id="del2" class="d-none">lolos</button>
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                          <thead>
                          <tr>
                              <th>
                              <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all" >
                                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                              </th>
                              <th>No</th>
                              <th>Nama</th>
                              <th>umur</th>
                              <th>Kabupaten</th>
                              <th>Provinsi</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          
                          <tbody>
                          @foreach ($lolos as $item)
                          <tr class="
                              {{ $item->status == 'lolos' ? 'text-success' : '' }}
                              {{ $item->status == 'tidak' ? 'text-danger' : '' }}
                              " 
                              
                              style="{{ $item->status == 'tidak' || $item->status == 'lolos' ? 'font-weight:bold;' : '' }}">
                              <td width="10">
                              <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}" name="ids[]" value="{{ $item->id }}">
                                  <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                              </div>
                              </td>
                              <td width="10">{{ $loop->iteration }}</td>
                              <td>
                              <a 
                                href="#mymodal"
                                data-remote="{{ route('status-pendaftar.show', $item->user->biodata2->id) }}"
                                data-toggle="modal"
                                data-target="#mymodal"
                                data-title="Detail Data" 
                                class=" text-decoration-none 
                                      {{ $item->status == 'lolos' ? 'text-success' : 'text-dark' }}
                                      {{ $item->status == 'tidak' ? 'text-danger' : 'text-dark' }}"
                              >
                                {{ $item->user->biodata2->user->biodata1->nama }}
                              </a>
                              </td>
                              <td>
                                {{ $item->user->biodata1->umur }}
                              </td>
                              <td>
                                {{ $item->user->biodata2->kabupaten->name }}
                              </td>
                              <td>
                                {{ $item->user->biodata2->provinsi->name }}
                              </td>
                              <td>
                                @if ($item->status == null)

                                  <button formaction="{{ route('wawancara.lolos', $item->id ) }}" class="btn btn-success btn-sm btn-icon icon-left"> <i class="fas fa-check"></i> Lolos</button>

                                  <button formaction="{{ route('wawancara-tidak.lolos', $item->id ) }}" class="btn btn-warning btn-sm btn-icon icon-left"> <i class="fas fa-times"></i> Tidak</button>
                              
                                @endif
                                  <button formaction="{{ route('wawancara.hapus', $item->id ) }}" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fas fa-trash"></i> delete</button>
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
      $("#lol1").click(function(){
        $("#lol2").click();
      });
      $("#nl1").click(function(){
        $("#nl2").click();
      }); 
      $("#hp1").click(function(){
        $("#hp2").click();
      }); 
    </script>     
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
    <script>
      jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
          var button =  $(e.relatedTarget);
          var modal  = $(this);

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
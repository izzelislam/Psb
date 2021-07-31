@extends('admin.pages.app')

@section('title','Data Nilai')

@section('title-page','Data Nilai')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Nilai</a></div>
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
                    <h4>Data Nilai</h4>
                  </div>
                  <div class="card-body">
                      <div class="row mb-3 justify-content-between">
                      <div class="col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Aksi Masal
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" id="lol1"> Lolos</a>
                          <a class="dropdown-item" id="nl1"> Tidak Lolos</a>
                          <a class="dropdown-item" id="hp1"> Hapus</a>
                        </div>
                          <div class="d-inline float-right">
                            <a href="{{ route('export-nilai') }}" class="btn btn-primary ml-2">Export Excel</a>
                              <button type="button" class="btn btn-info ml-2" id="filter">Filter</button>
                          </div>
                      </div>
                      </div>
                        <form method="POST">
                        @csrf
                        <button  formaction="{{ route('nilai-lolos.all') }}" id="lol2" class="d-none">lolos</button>
                        <button  formaction="{{ route('nilai-tidak-lolos.all') }}" id="nl2" class="d-none">lolos</button>
                        <button  formaction="{{ route('nilai-hapus.all') }}" id="hp2" class="d-none">lolos</button>
                      <div class="table-responsive">
                        <table class="table table-striped display nowrap" id="table-2" class="w-100">
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
                              <th>Iq</th>
                              <th>Kepribadian</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          
                          <tbody>
                          @foreach ($nilai as $item)
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
                              <td>{{ $item->nilai_tes_iq }}</td>
                              <td>{{ $item->nilai_tes_kepribadian}}</td>
                              <td><span class="badge badge-{{ $item->status == 'lolos' ? 'success':'' }}{{ $item->status == 'tidak' ? 'danger':'' }}">{{ $item->status }}</span></td>
                              <td>
                                @if ($item->status == null)

                                  <button formaction="{{ route('nilai.lolos', $item->id ) }}" class="btn btn-success btn-sm btn-icon icon-left"> <i class="fas fa-check"></i> Lolos</button>

                                  <button formaction="{{ route('nilai-tidak.lolos', $item->id ) }}" class="btn btn-warning btn-sm btn-icon icon-left"> <i class="fas fa-times"></i> Tidak</button>
                              
                                @endif
                                  <button formaction="{{ route('nilai.hapus', $item->id ) }}" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fas fa-trash"></i> delete</button>
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
          <form method="GET">
            
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col">
                    <label>Nilai Tes Iq</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Minimal</label>
                      <input type="number" class="form-control" name="nilai_tes_iq_min" placeholder="MIN" value="{{ request()->get('nilai_tes_iq_min') }}">
                    </div>
                  </div> 
                  <div class="col">
                    <div class="form-group">
                      <label>Maksimal</label>
                      <input type="number" class="form-control" name="nilai_tes_iq_max" placeholder="MAX" value="{{ request()->get('nilai_tes_iq_max') }}">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col">
                    <label>Nilai Tes Kepribadian</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Minimal</label>
                      <input type="number" class="form-control" name="nilai_tes_kepribadian_min" placeholder="MIN" value="{{ request()->get('nilai_tes_kepribadian_min') }}">
                    </div>
                  </div> 
                  <div class="col">
                    <div class="form-group">
                      <label>Maksimal</label>
                      <input type="number" class="form-control" name="nilai_tes_kepribadian_max" placeholder="MAX" value="{{ request()->get('nilai_tes_kepribadian_max') }}">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Pilih Gelombang</label>
                      <select name="gelombang" class="custom-select">
                        <option value="" >-- pilih gelombang --</option>
                        <option value="gel-1" >GELOMBANG 1</option>
                        <option value="gel-2" >GELOMBANG 2</option>
                        <option value="gel-3" >GELOMBANG 3</option>
                        <option value="gel-4" >GELOMBANG 4</option>
                      </select>
                    </div>
                  </div> 
                </div>
              
              </div>
            </div>
            
            <button type="submit" formaction="{{ route('nilai.index') }}" class="btn btn-primary">Terapkan</button>
            <button type="submit" formaction="{{ route('nilai-filter.reset') }}" class="btn btn-primary float-right">Atur Ulang</button>
             
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
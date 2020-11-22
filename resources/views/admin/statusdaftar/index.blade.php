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
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">
                          <i class="fas fa-home"></i>Tahap 2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
                          <i class="fas fa-id-card"></i> Tahap 3</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">
                          <i class="fas fa-mail-bulk"></i> Tahap 4</a>
                      </li>
                      
                    </ul>
                    <div class="tab-content" id="myTabContent5">
                      <div class="tab-pane fade show active" id="home5" role="tabpanel" aria-labelledby="home-tab5">
                        
                        <div>
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
                                        <div class="btn-group dropleft d-inline float-right">
                                            <a href="{{ route('pendaftar-export') }}" type="button" class="btn btn-primary">
                                            Export Excel
                                            </a>

                                            <button type="button" class="btn btn-info ml-2" id="filter">Filter</button>
                                        </div>
                                    </div>
                                    </div>
                                     <form method="POST">
                                      @csrf
                                      <button  formaction="{{ route('bulk-action') }}" id="lol2" class="d-none">lolos</button>
                                      <button  formaction="{{ route('tidak-lolos') }}" id="nl2" class="d-none">lolos</button>
                                      <button  formaction="{{ route('hapusall') }}" id="hp2" class="d-none">lolos</button>
                                    <div class="table-responsive">
                                      <table class="table table-striped display nowrap" id="status-pendaftar">
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
                                            <th>Umur</th>
                                            <th>Pendidikan</th>
                                            <th>Cita-Cita</th>
                                            <th>Prestasi</th>
                                            <th>Skill</th>
                                            <th>Hafalan</th>
                                            <th>Gamer</th>
                                            <th>Keluarga</th>
                                            <th>Orang Tua</th>
                                            <th>Penghasilan Ortu</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                       
                                          <tbody>
                                          @foreach ($biodata2 as $item)
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
                                                data-remote="{{ route('status-pendaftar.show', $item->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Data" 
                                                class=" text-decoration-none 
                                                      {{ $item->status == 'lolos' ? 'text-success' : 'text-dark' }}
                                                      {{ $item->status == 'tidak' ? 'text-danger' : 'text-dark' }}"
                                              >
                                                {{ $item->user->biodata1->nama }}
                                              </a>
                                              </td>
                                              <td>
                                              {{ $item->user->biodata1->umur }} &nbsp; Tahun
                                              </td>
                                              <td>{{ $item->pendidikan_terakhir }}</td>
                                              <td>{{ $item->cita_cita }}</td>
                                              <td>{{ $item->prestasi }}</td>
                                              <td>{{ $item->skill }}</td>
                                              <td>{{ $item->jumlah_hafalan }} &nbsp; Juz</td>
                                              <td>{{ $item->suka_game }}</td>
                                              <td>{{ $item->user->biodata1->keluarga }}</td>
                                              <td>{{ $item->orang_tua }}</td>
                                              <td> <strong>Rp.</strong>{{ $item->penghasilan_ortu }}</td>
                                              <td><span class="badge badge-{{ $item->status == 'lolos' ? 'success':'' }}{{ $item->status == 'tidak' ? 'danger':'' }}">{{ $item->status }}</span></td>
                                              <td>
                                                @if ($item->status == null)
  
                                                  <button formaction="{{ route('status-pendaftar.lolos', $item->id ) }}" class="btn btn-success btn-sm btn-icon icon-left"> <i class="fas fa-check"></i> Lolos</button>

                                                  <button formaction="{{ route('status-pendaftar.tidak', $item->id ) }}" class="btn btn-warning btn-sm btn-icon icon-left"> <i class="fas fa-times"></i> Tidak</button>
                                              
                                                @endif

                                                <a href="#mymodal"
                                                  data-remote="{{ route('status-pendaftar.show',$item->id) }}"
                                                  data-toggle="modal"
                                                  data-target="#mymodal"
                                                  data-title="Detail Data" 
                                                  class="btn btn-info btn-sm btn-icon icin-right">
                                                  <i class="fas fa-eye"></i>
                                                  Detail  
                                                </a>
                                                  <button form="{{ route('pendaftar-hapus', $item->id ) }}" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fas fa-trash"></i> delete</button>
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
                      <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                        <div class="card">
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
                                    <th w>
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </th>
                                    <th >No</th>
                                    <th style="width:100px;">Nama</th>
                                    <th>Tes Iq</th>
                                    <th>Tes Pribadi</th>
                                    <th style="width:100px;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($nilai as $item)
                                  <tr>
                                    <td style="width: 10px;">
                                      <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}">
                                        <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                                      </div>
                                    </td>
                                    <td style="width: 10px;">{{ $loop->iteration }}</td>
                                    <td>
                                      <a href="#mymodal"
                                         data-remote="{{ route('status-pendaftar.show', $item->user->biodata2->id) }}"
                                         data-target="#mymodal"
                                         data-toggle="modal"
                                      >
                                        {{ $item->user->biodata2->user->biodata1->nama }}
                                      </a>
                                    </td>
                                    <td>
                                      {{ $item->nilai_tes_iq }} 
                                    </td>
                                    <td>{{ $item->nilai_tes_kepribadian }}</td>
                                  
                                    <td>
                                        <a href="" class="btn btn-success btn-sm btn-icon icon-left"> <i class="fas fa-check"></i> Lolos</a>
                                        <a href="" class="btn btn-warning btn-sm btn-icon icon-left"> <i class="fas fa-times"></i> Tidak</a>
                                      
                                      <form action="{{ route('pendaftar-hapus', $item->id ) }}" method="POST" class="d-inline">
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
                      <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
                        33r.
                      </div>
                    </div>
                  </div>
                </div>
@endsection
@push('end-script')
    <script>
      $("#status-pendaftar").dataTable({
        "scrollX": true,
        columnDefs: [{ sortable: true, targets: [0, 2, 3] }],
      });  
    </script>
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
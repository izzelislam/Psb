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
                          <i class="fas fa-home"></i> Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
                          <i class="fas fa-id-card"></i> Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">
                          <i class="fas fa-mail-bulk"></i> Contact</a>
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
                                        <div class="btn-group dropleft d-inline float-right">
                                            <a href="{{ route('pendaftar-export') }}" type="button" class="btn btn-primary">
                                            Export Excel
                                            </a>

                                            <button class="btn btn-info ml-2" id="filter">Filter</button>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table table-striped display nowrap" id="status-pendaftar">
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
                                            <th>Umur</th>
                                            <th>Pendidikan</th>
                                            <th>Cita-Cita</th>
                                            <th>Prestasi</th>
                                            <th>Skill</th>
                                            <th>Hafalan</th>
                                            <th>Gamer</th>
                                            <th>Orang Tua</th>
                                            <th>Penghasilan Ortu</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($biodata2 as $item)
                                        <tr>
                                            <td width="10">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $item->id }}">
                                                <label for="checkbox-{{ $item->id }}" class="custom-control-label">&nbsp;</label>
                                            </div>
                                            </td>
                                            <td width="10">{{ $loop->iteration }}</td>
                                            <td>
                                            {{ $item->user->biodata1->nama }}
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
                                            <td>{{ $item->orang_tua }}</td>
                                            <td> <strong>Rp.</strong>{{ $item->penghasilan_ortu }}</td>
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
                      <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                        22.
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
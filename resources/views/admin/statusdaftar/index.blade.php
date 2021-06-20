@extends('admin.pages.app')

@section('title','Data Biodata Pendaftar')

@section('title-page','Data Biodata Pendaftar')

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data Biodata Pendaftar</a></div>
        <div class="breadcrumb-item">List</div>
    </div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    {{-- feedback message --}}
    @if (session('hapus'))
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
    @endif
    @if (session('edit-sukses'))
        @if (session('edit-sukses'))
            <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                {{ session('edit-sukses') }}
            </div>
            </div>
        @endif
    @endif

    <div class="card">
      <div class="card-header">
        <h4>Daftar Biodata Pendaftar</h4>
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
              <div class="btn-group dropleft d-inline float-right">
                  <a href="{{ route('biodata-export') }}" type="button" class="btn btn-primary">
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
                  <th>No WA</th>
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
                      {{ $item->user->biodata1->no_wa }}
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
                      <a
                        href="{{ route('status-pendaftar.edit',$item->id) }}"
                        class="btn btn-primary btn-sm btn-icon icin-right">
                        <i class="fas fa-edit"></i>
                        Edit  
                      </a>  
                      <button formaction="{{ route('status-daftar-hapus', $item->id ) }}" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="fas fa-trash"></i> delete</button>
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
          <form method="GET">

            <div class="form-group">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur</label>
                    <select name="umur" class="custom-select">
                      <option selected value="{{ null }}">-- umur --</option>
                      <option value="16" {{ request()->get('umur') == '16' ? 'selected' :''  }}>16 Tahun</option>
                      <option value="17" {{ request()->get('umur') == '17' ? 'selected' :''  }}>17 Tahun</option>
                      <option value="18" {{ request()->get('umur') == '18' ? 'selected' :''  }}>18 Tahun</option>
                      <option value="19" {{ request()->get('umur') == '19' ? 'selected' :''  }}>19 Tahun</option>
                      <option value="20" {{ request()->get('umur') == '20' ? 'selected' :''  }}>20 Tahun</option>
                      <option value="21" {{ request()->get('umur') == '21' ? 'selected' :''  }}>21 Tahun</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kondisi Keluarga</label>
                    <select name="keluarga" class="custom-select">
                      <option selected value="{{ null }}">-- Kondisi Keluarga --</option>
                      <option value="mampu" {{ request()->get('keluarga') == 'mampu' ? 'selected' :''  }}>Keluarga Mampu</option>
                      <option value="tidak-mampu" {{ request()->get('keluarga') == 'tidak-mampu' ? 'selected' :''  }}>Keluarga Tidak-Mampu</option>
                    </select>
                  </div>
                </div>  
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Orang Tua</label>
                    <select name="orang_tua" class="custom-select">
                      <option selected value="{{ null }}">-- orang tua --</option>
                      <option value="lengkap" {{ request()->get('orang_tua') == 'lengkap' ? 'selected' :''  }}>Lengkap</option>
                      <option value="ayah" {{ request()->get('orang_tua') == 'ayah' ? 'selected' :''  }}>Ayah</option>
                      <option value="ibu" {{ request()->get('orang_tua') == 'ibu' ? 'selected' :''  }}>Ibu</option>
                      <option value="yatim_piatu" {{ request()->get('orang_tua') == 'yatim_piatu' ? 'selected' :''  }}>Yatim Piatu</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                    <select name="pendidikan_terakhir" class="custom-select">
                      <option selected value="{{ null }}">-- Pendidikan --</option>
                      <option value="SD" {{ request()->get('pendidikan_terakhir') == 'SD' ? 'selected' :''  }}>SD Tahun</option>
                      <option value="SMP" {{ request()->get('pendidikan_terakhir') == 'SMP' ? 'selected' :''  }}>SMP Tahun</option>
                      <option value="SMA" {{ request()->get('pendidikan_terakhir') == 'SMA' ? 'selected' :''  }}>SMA Tahun</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Perokok</label>
                    <div class="selectgroup selectgroup-pills">
                      <label class="selectgroup-item">
                        <input type="radio" name="perokok" value="iya" class="selectgroup-input" {{ request()->get('perokok') == 'iya' ? 'checked' :''  }}>
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="perokok" value="tidak" {{ request()->get('perokok') == 'tidak' ? 'checked' :''  }} class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-times"></i></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Punya Pacar</label>
                    <div class="selectgroup selectgroup-pills">
                      <label class="selectgroup-item">
                        <input type="radio" name="punya_pacar" value="iya" class="selectgroup-input" {{ request()->get('punya_pacar') == 'iya' ? 'checked' :''  }}>
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="punya_pacar" value="tidak" {{ request()->get('punya_pacar') == 'tidak' ? 'checked' :''  }} class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-times"></i></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label class="form-label">Gamer</label>
                    <div class="selectgroup selectgroup-pills">
                      <label class="selectgroup-item">
                        <input type="radio" name="suka_game" value="iya" class="selectgroup-input" {{ request()->get('suka_game') == 'iya' ? 'checked' :''  }}>
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="suka_game" value="tidak" {{ request()->get('suka_game') == 'tidak' ? 'checked' :''  }} class="selectgroup-input">
                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-times"></i></span>
                      </label>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <label>Pendapatan Orang Tua</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Minimal</label>
                        <input type="number" class="form-control" name="penghasilan_ortu_min" placeholder="Rp." value="{{ request()->get('penghasilan_ortu_min') }}">
                      </div>
                    </div> 
                    <div class="col">
                      <div class="form-group">
                        <label>Maksimal</label>
                        <input type="number" class="form-control" name="penghasilan_ortu_max" placeholder="Rp." value="{{ request()->get('penghasilan_ortu_max') }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
           <button type="submit" formaction="{{ route('status-pendaftar') }}" class="btn btn-primary">Terapkan</button>
           <button type="submit"  formaction="{{ route('filter-reset-tahap2') }}"  class="btn btn-primary float-right">Atur Ulang</button>
             
          </form>
                
        `});
    </script>
    {{-- modal deatil --}}
    <script>
      $(document).ready(function($){
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
                            
                                
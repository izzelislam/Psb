@extends('admin.pages.app')

@section('title','Dahsboard')

@section('title-page','Dashboard')

@push('end-style')
    <link rel="stylesheet" href="{{ asset('vendor/kalender/simple-calendar.css') }}">
@endpush

@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    </div>
@endsection

@section('content')
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Pendaftar</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Biodata1::whereHas('tahun_ajaran',function($query){$query->where('status','aktif');})->count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <a href="{{ route('chat-admin.index') }}">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-envelope-open"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pesan Masuk</h4>
                    </div>
                    <div class="card-body">
                      {{ App\Models\Teman::whereHas('chat',function($query){$query->where('read','=',null);})->count() }}
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-bacon"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Informasi</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Jadwal::all()->count() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            {{-- chart --}}
            <div class="col-12 col-md-8 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Chart Umur</h4>
                </div>
                <div class="card-body pb-5">
                  <canvas id="myChart3"></canvas>
                </div>
              </div>
            </div>
            {{-- side --}}
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pendaftar Terbaru</h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    @foreach ($pendaftar_baru as $item)
                      <li class="media">
                        <img class="mr-3 rounded-circle" width="40" src="{{ Avatar::create($item->nama)->toGravatar(['d' => 'wavatar', 'r' => 'pg', 's' => 100])}}" alt="avatar" >
                        <div class="media-body">
                          <div class="float-right text-primary"><small>{{ $item->created_at->format('Y-m-d') }}</small></div>
                          <div class="media-title"><small><strong>{{ $item->nama }}</strong></small></div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="{{ route('data-pendaftar') }}" class="btn btn-primary btn-lg btn-round">
                      View All
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Info</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Nama Kegiatan</th>
                        </tr>
                        @foreach ($jadwal as $item)
                          <tr>
                            <td class="p-0 text-center">
                            <span>{{ $loop->iteration }}</span>
                            </td>
                            <td>{{ $item->title }}</td>
                          </tr>
                        @endforeach
                      </table>
                      <span class="float-right mr-4 mb-3"><a href="{{ route('informasi.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a></span>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-body" id="kalender">
                </div>
              </div>
            </div>
          </div>
@endsection
@push('end-script')
     <script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
     <script src="{{ asset('vendor/kalender/jquery.simple-calendar.min.js') }}"></script>
     
     <script>
      $(function(){
        $("#kalender").simpleCalendar(
          {
            months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            days: ['Ahad', 'Senin', 'Selesa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            displayYear: true,
            fixedStartDay: true,
            disableEventDetails: true,
            disableEmptyDetails: true 
	        }
        );
      });       
     </script>

     <script>
       var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [
                {{ App\Models\Biodata1::where('umur','=',16)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
                {{ App\Models\Biodata1::where('umur','=',17)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
                {{ App\Models\Biodata1::where('umur','=',18)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
                {{ App\Models\Biodata1::where('umur','=',19)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
                {{ App\Models\Biodata1::where('umur','=',20)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
                {{ App\Models\Biodata1::where('umur','>',21)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
                {{ App\Models\Biodata1::where('umur','<',16)->whereHas('tahun_ajaran',function($query){$query->where('status','=','aktif');})->count() }},
              ],
              backgroundColor: [
                '#191d21',
                '#63ed7a',
                '#ffa426',
                '#fc544b',
                '#6777ef',
                '#dd67ef',
                '#bbef67',
              ],
              label: 'Dataset 1'
            }],
            labels: [
              '16',
              '17',
              '18',
              '19',
              '20',
              'diatas 21',
              'dibawah 16'
            ],
          },
          options: {
            responsive: true,
            legend: {
              position: 'bottom',
            },
          }
        });
     </script>
@endpush
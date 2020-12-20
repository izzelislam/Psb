 @php
	$teman=App\Models\Teman::where('users_id','=',Auth::user()->id)->pluck('id')->first();

	$pesan=App\Models\Chat::where('teman_id','=',$teman)->where('read','=',null)->whereHas('user',function($query){
		$query->where('role','=','admin');
	})->count();
@endphp
@extends('front.dashboard.pages.app')

@section('title','User Dashboard')

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
                    {{ App\Models\Biodata1::whereHas('tahun_ajaran',function($query){$query->where('tahun','=',date('Y'));})->count() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pendaftaran Dibuka</h4>
                  </div>
                  <div class="card-body">
                    {{ App\models\TahunAjaran::where('status','=','aktif')->pluck('gelombang')->first() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-envelope-open"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pesan Masuk</h4>
                  </div>
                  <div class="card-body">
                    {{ $pesan }}
                  </div>
                </div>
              </div>
            </div>
          </div>
<div class="row">
	{{-- @php
		dd($tahap4->status)
	@endphp --}}
	<div class="col-12 mb-4">
		<div class="hero
		@if ( isset($tahap2) && $tahap2->status == null || isset($tahap3) && $tahap3->status == null || isset($tahap4) && $tahap4->status == null || isset($tahap4) && $tahap4->status == null)
			bg-warning
		t
		@endif
		@if ( isset($tahap2) && $tahap2->status == 'lolos' || isset($tahap3) && $tahap3->status == 'lolos' || isset($tahap4) && $tahap4->status == 'lolos')
			bg-success	
		@elseif(empty($tahap1)  || empty($tahap2)  || empty($tahap3))
			bg-info	
		@endif
		@if ( (isset($tahap2) && $tahap2->status == 'tidak') || (isset($tahap3) && $tahap3->status == 'tidak') || (isset($tahap4) && $tahap4->status == 'tidak') || (isset($tahap5) && $tahap5->status == 'tidak'))
			bg-danger
		@endif
		{{-- @if(empty($tahap1)  || empty($tahap2)  || empty($tahap3))
			bg-info
		@endif --}}
		text-white">
			<div class="hero-inner">
				@if (empty($tahap1))
					<h2>Selamat datang, {{ Auth::user()->name }}!</h2>
					<p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Pertama</strong> anda silahkan klik tombol di bawah ini</p>

					<div class="mt-4">
						<a href="{{ route('tahap-pertama') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
					</div>
				@elseif(empty($tahap2) && isset($tahap1))
					<h2>Halo, {{ Auth::user()->name }} anda telah mengikuti tes tahap pertama.</h2>
					<p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Kedua</strong> anda silahkan klik tombol di bawah ini</p>

					<div class="mt-4">
						<a href="{{ route('tahap-kedua') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
					</div>
				@elseif(!empty($tahap2) && isset($tahap1) && $tahap2->status == null) 
					<h2>Hallo, {{ Auth::user()->name }}!</h2>
					<p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Kedua</strong>,Anda bisa lanjut <br>mengikuti tes tahap ketiga jika dinyatakan lolos di tes tahap kedua</p>
				@elseif(!empty($tahap3) && isset($tahap2) && $tahap3->status == null) 
					<h2>Hallo, {{ Auth::user()->name }}!</h2>
					<p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap KeTiga</strong>,Anda bisa lanjut <br>mengikuti tes tahap ke-empat jika dinyatakan lolos di tes tahap KeTiga</p>
				@elseif(!empty($tahap4) && isset($tahap4) && $tahap4->status == null) 
					<h2>Hallo, {{ Auth::user()->name }}!</h2>
					<p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Ke-Empat</strong>,Anda bisa lanjut <br>mengikuti tes tahap Ke-Lima jika dinyatakan lolos di tes tahap Ke-Empat</p>
				@elseif(!empty($tahap2) && $tahap2->status == 'lolos')
					@if ($tahap2->status == 'lolos' && !isset($tahap3->status) )
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
						<p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Ketiga</strong> anda silahkan klik tombol di bawah ini</p>

						<div class="mt-4">
							<a href="{{ route('tahap-ketiga-iq') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
						</div>
					@elseif($tahap3->status == 'lolos' && !isset($tahap4->status))
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
						<p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Ke-Empat</strong> silahkan anda klik tombol di bawah ini.</p>

						<div class="mt-4">
							<a href="{{ route('tahap-empat-video') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
						</div>
					@elseif($tahap4->status == 'lolos' && !isset($tahap5->status))
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
						<p class="lead">untuk  tes <strong class="font-weight-bold">Tahap Ke-Lima</strong> anda akan kami hubungi untuk melakukan tes wawancara.</p>
						<div class="mt-4">
							<a href="{{ route('tahap-lima-wawancara') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-microphone"></i> Info mengenai tes wawancara</a>
						</div>
					@elseif( isset($tahap4->status) && isset($tahap5->status) && $tahap5->status == 'lolos')
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos sebagai calon santri Pondok Informatika-Almadinah</strong></p>
						<p class="lead">untuk informasi selanjutnya akan di infokan melalui whatsapp
						</p>
					@elseif( isset($tahap4->status) && isset($tahap5->status) && $tahap5->status == 'tidak')
						<h2>Mohon Maaf, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Tidak Lolos sebagai calon santri Pondok Informatika-Almadinah</strong></p>
					
					@elseif( isset($tahap2->status) == 'tidak' || isset($tahap3->status) == 'tidak' || isset($tahap4->status) == 'tidak')
						<h2>Mohon Maaf, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya
						</p>				
					@endif
				@else
					<h2>Mohon Maaf, {{ Auth::user()->name }}! .</h2>
					<p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya
					</p>
				@endif
			</div>
		</div>
	</div>
</div>
{{-- <div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
		<div class="card-icon bg-primary">
			<i class="far fa-user"></i>
		</div>
		<div class="card-wrap">
			<div class="card-header">
			<h4>Total Admin</h4>
			</div>
			<div class="card-body">
			10
			</div>
		</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
		<div class="card-icon bg-danger">
			<i class="far fa-newspaper"></i>
		</div>
		<div class="card-wrap">
			<div class="card-header">
			<h4>News</h4>
			</div>
			<div class="card-body">
			42
			</div>
		</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
		<div class="card-icon bg-warning">
			<i class="far fa-file"></i>
		</div>
		<div class="card-wrap">
			<div class="card-header">
			<h4>Reports</h4>
			</div>
			<div class="card-body">
			1,201
			</div>
		</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
		<div class="card-icon bg-success">
			<i class="fas fa-circle"></i>
		</div>
		<div class="card-wrap">
			<div class="card-header">
			<h4>Online Users</h4>
			</div>
			<div class="card-body">
			47
			</div>
		</div>
		</div>
	</div>
</div> --}}
{{-- tes yang di ikuti --}}
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Daftar Tes Yang Anda Ikuti</h4>
				<div class="card-header-action">
				</div>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-striped" id="sortable-table">
						<thead>
							<tr>
							<th>
								<i class="fas fa-th"></i>
							</th>
							<th>Tes</th>
							<th>Status</th>
							<th>Status pengerjaan</th>
							</tr>
						</thead>
						<tbody>
						{{-- tahap pertama --}}
						<tr>
						<td>
							<div class="sort-handler">
							<i class="fas fa-th"></i>
							</div>
						</td>
						<td>tes tahap Pertama</td>
						<td>
							@if ($tahap1->count() == 0)
								<div class="badge badge-warning">
								Belum mengikuti tes ini
								</div>
							@else
								<div class="badge badge-success">
								Lolos
								</div>
							@endif
						</td>
						<td>
							@if ($tahap1->count() == 0)
								<a href="{{ route('tahap-pertama') }}" class="btn btn-primary">Ikuti Tes</a>
							@else
								<span class="btn btn-success">Sudah Di Ikuti</span>
							@endif
						</td>
						</tr>
						{{-- tahapp ke dua --}}
							@if ($tahap1->count() > 0 )
							<tr>
							<td>
								<div class="sort-handler">
								<i class="fas fa-th"></i>
								</div>
							</td>
							<td>tes tahap kedua</td>
							<td>
								{{-- @php
									dd($tahap2->status)
								@endphp --}}
								@if (empty($tahap2))
								<div class="badge badge-warning">
									Belum mengikuti tes
								</div>
								@elseif($tahap2->status == "tidak")
								<div class="badge badge-danger">
									Tidak Lolos
								</div>
								@elseif($tahap2->status == "lolos")
								<div class="badge badge-success">
									Lolos
								</div>
								@else
									<div class="badge badge-info">
									Sudah Mengikuti Tes
								</div>
								@endif
	
							</td>
							<td>
								@if (empty($tahap2))
									<a href="{{ route('tahap-kedua') }}" class="btn btn-primary">Ikuti Tes</a>
								@else
									<span class="btn btn-success">Sudah Di Ikuti</span>
								@endif
							</td>
							</tr> 
							@endif
						{{-- tahap ke tiga --}}
							@if (!empty($tahap2) && $tahap2->status == "lolos")
							<tr>
							<td>
								<div class="sort-handler">
								<i class="fas fa-th"></i>
								</div>
							</td>
							<td>tes tahap Ketiga</td>
							<td>
								@if (empty($tahap3))
									<div class="badge badge-warning">
									Belum mengikuti tes 
									</div>
								@elseif ($tahap3->nilai_tes_iq != null && $tahap3->nilai_tes_kepribadian != null && $tahap3->status == null)
									<div class="badge badge-info">
									Sudah mengikuti tes 
									</div>
								@elseif($tahap3->status == 'lolos')
									<div class="badge badge-success">
									Lolos
									</div>
								@elseif($tahap3->status == 'tidak')
									<div class="badge badge-danger">
									tidak
									</div>
								@else
								@endif
							</td>
							<td>
								@if (empty($tahap3))
									<a href="{{ route('tahap-ketiga-iq') }}" class="btn btn-primary">Ikuti Tes</a>
								@elseif($tahap3->nilai_tes_iq != 0 && $tahap3->nilai_tes_kepribadian == 0)
									<a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
								@else
									<span class="btn btn-success">Sudah Di Ikuti</span>
								@endif
							</td>
							</tr> 
							@endif
						{{-- tahap 4 --}}
							@if (!empty($tahap3) && $tahap3->status == "lolos")
							<tr>
							<td>
								<div class="sort-handler">
								<i class="fas fa-th"></i>
								</div>
							</td>
							<td>tes tahap Ke Empat</td>
							<td>
								@if (empty($tahap4))
									<div class="badge badge-warning">
									Belum mengikuti tes 
									</div>
								@elseif($tahap4->status == null && $tahap4->link != null)
									<div class="badge badge-info">
									Sudah Kirim Link Video
									</div>
								@elseif($tahap4->status == 'lolos')
									<div class="badge badge-success">
									Lolos
									</div>
								@elseif($tahap4->status == 'tidak')
									<div class="badge badge-danger">
									tidak
									</div>
								@else
								@endif
							</td>
							<td>
								@if (empty($tahap4))
									<a href="{{ route('tahap-empat-video') }}" class="btn btn-primary">Ikuti Tes</a>
								@elseif($tahap3->nilai_tes_iq != 0 && $tahap3->nilai_tes_kepribadian == 0)
									<a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
								@else
									<span class="btn btn-success">Sudah Di Ikuti</span>
								@endif
							</td>
							</tr> 
							@endif
						{{-- tahap 5 --}}
						@if (!empty($tahap4) && $tahap4->status == "lolos")
						<tr>
						<td>
							<div class="sort-handler">
							<i class="fas fa-th"></i>
							</div>
						</td>
						<td>tes tahap Ke Lima</td>
						<td>
							@if ($tahap5->status == null)
								<div class="badge badge-info">
								Menunggu Di Hubunggi
								</div>
							@elseif($tahap5->status == 'lolos')
								<div class="badge badge-success">
								Lolos
								</div>
							@elseif($tahap5->status == 'tidak')
								<div class="badge badge-danger">
								tidak
								</div>
							@else
							@endif
						</td>
						<td>
							@if ($tahap5->status == null)
								<a href="{{ route('tahap-lima-wawancara') }}" class="btn btn-primary">Info Wawancara</a>
							@else
								<span class="btn btn-success">Sudah Di Ikuti</span>
							@endif
						</td>
						</tr> 
						@endif
						{{-- selamat --}}
							@if (!empty($tahap5) && $tahap5->status == "lolos")
							<tr>
							<td rowspan="3" class="text-success">
								<div class="sort-handler">
								<i class="fas fa-th"></i>
								</div>
							</td>
							<td colspan="3" class="text-success">
								<smal><strong><i>Selamat Anda Lolos Seleksi, Unuk Info Selanjutnya Akan Diasampaikan Melalui WhatsApp</i></strong></smal>
							</td> 
							</tr> 
							@elseif(!empty($tahap5) && $tahap5->status == "tidak")
							<tr>
							<td rowspan="3" class="text-danger">
								<div class="sort-handler">
								<i class="fas fa-th"></i>
								</div>
							</td>
							<td colspan="3" class="text-danger">
								<smal><strong><i>Mohon Maaf Anda Tidak Lolos Seleksi</i></strong></smal>
							</td> 
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
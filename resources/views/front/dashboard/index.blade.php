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
				@if(empty($tahap2) && isset($tahap1))
					<h2>Halo Selamat datang, {{ Auth::user()->name }}</h2>
					<p class="lead">untuk melakukan seleksi <strong class="font-weight-bold">Tahap Pertama</strong> anda silahkan klik tombol di bawah ini</p>

					<div class="mt-4">
						<a href="{{ route('tahap-kedua') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
					</div>
				@elseif(!empty($tahap2) && isset($tahap1) && $tahap2->status == null) 
					<h2>Hallo, {{ Auth::user()->name }}!</h2>
					<p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Pertama</strong>,Anda bisa lanjut <br>mengikuti tes tahap kedua jika dinyatakan lolos di tes tahap pertama</p>
				@elseif(!empty($tahap3) && isset($tahap2) && $tahap3->status == null) 
					<h2>Hallo, {{ Auth::user()->name }}!</h2>
					<p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Kedua</strong>,Anda bisa lanjut <br>mengikuti tes tahap ke-tiga jika dinyatakan lolos di tes tahap keDua</p>
				@elseif(!empty($tahap4) && isset($tahap4) && $tahap4->status == null) 
					<h2>Hallo, {{ Auth::user()->name }}!</h2>
					<p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Ke-Tiga</strong>,Anda bisa lanjut <br>mengikuti tes tahap Ke-Empat jika dinyatakan lolos di tes tahap Ke-Tiga</p>
				@elseif(!empty($tahap2) && $tahap2->status == 'lolos')
					@if ($tahap2->status == 'lolos' && !isset($tahap3->status) )
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
						<p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Ke-Dua</strong> anda silahkan klik tombol di bawah ini</p>

						<div class="mt-4">
							<a href="{{ route('tahap-ketiga-iq') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
						</div>
					@elseif($tahap3->status == 'lolos' && !isset($tahap4->status))
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
						<p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Ke-Tiga</strong> silahkan anda klik tombol di bawah ini.</p>

						<div class="mt-4">
							<a href="{{ route('tahap-empat-video') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
						</div>
					@elseif($tahap4->status == 'lolos' && !isset($tahap5->status))
						<h2>Selamat, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
						<p class="lead">untuk  tes <strong class="font-weight-bold">Tahap Ke-Empat</strong> anda akan kami hubungi untuk melakukan tes wawancara.</p>
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

@if (isset($jadwal))
	<div class="row my-3">
		<div class="col">
			<h5 class="text-primary">Informasi</h5>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="row">
				@foreach ($jadwal as $item)
					<div class="col-1 col-md-3">
						<a href="{{ route('informasi-detail-user', $item->id) }}">
							<div class="card">
								<div style="
									width: 100%; 
									height: 158px; 
									background-image: url({{ Storage::url($item->gambar) }});
									background-size: contain, cover;
									" 
									class="bg-dark"
								></div>
								{{-- <img src="{{ Storage::url($item->gambar) }}" class="card-img-top" alt="..." style="height: 150px;"> --}}
								<div class="card-body">
									<h5 class="card-title">{{ $item->title }}</h5>
									<p class="card-text">{{ \Illuminate\Support\Str::limit($item->isi,100, $end='.' ) }}</p>
									<p class="card-text"><small class="text-muted">{{ $item->created_at->format('Y-m-d') }}</small></p>
								</div>
								</div>
						</a>
					</div>
				@endforeach
			</div>	
			<div class="mb-4 d-flex justify-content-end"">
				<div> <a href="{{ route('informasi-user') }}"> <h6>Selengkapnya</h6></a></div>
			</div>
		</div>
	</div>
@endif
{{-- < class="row">
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
</> --}}
{{-- tes yang di ikuti --}}
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Daftar Tes Yang Anda Ikuti</h4>
				<div class="card-header-action">
				</div>
			</div>

			<div class="row p-4 my-2">
				<div class="col-md-1"><i class="fas fa-th"></i></div>
				<div class="col-md-3"><b>Tes</b></div>
				<div class="col-md-4"><b>Status</b></div>
				<div class="col-md-4"><b>Status pengerjaan</b></div>
			</div>

				{{-- tes tahap pertama --}}
				@if ($tahap1->count() > 0 )
				<div class="row px-4">
					<div class="col-md-1 py-2"><i class="fas fa-th"></i></div>
					<div class="col-md-3 py-2"><b>tes tahap pertama</b></div>
						<div class="col-md-4 py-2">
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
						</div>
						<div class="col-md-4 py-2">
							@if (empty($tahap2))
								<a href="{{ route('tahap-kedua') }}" class="btn btn-primary">Ikuti Tes</a>
							@else
								<span class="btn btn-success">Sudah Di Ikuti</span>
							@endif
						</div>
					</div>
				@endif

				{{-- tes tahap ke dua --}}
				@if (!empty($tahap2) && $tahap2->status == "lolos")
					<div class="row px-4">
					<div class="col-md-1 py-2"><i class="fas fa-th"></i></div>
					<div class="col-md-3 py-2">tes tahap kedua</div>
					<div class="col-md-4 py-2">
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
					</div>
					<div class="col-md-4 my-2">
						@if (empty($tahap3))
							<a href="{{ route('tahap-ketiga-iq') }}" class="btn btn-primary">Ikuti Tes</a>
						@elseif($tahap3->nilai_tes_iq != 0 && $tahap3->nilai_tes_kepribadian == 0)
							<a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
						@else
							<span class="btn btn-success">Sudah Di Ikuti</span>
						@endif
					</div>
					</div> 
				@endif

				{{-- tes tahap ke tiga --}}
				@if (!empty($tahap3) && $tahap3->status == "lolos")
				<div class="row px-4">
					<div class="col-md-1 py-2"><i class="fas fa-th"></i></div>
					<div class="col-md-3 py-2">tes tahap Ke Tiga</div>
					<div class="col-md-4 py-2">
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
					</div>
					<div class="col-md-4 py-2">
						@if (empty($tahap4))
							<a href="{{ route('tahap-empat-video') }}" class="btn btn-primary">Ikuti Tes</a>
						@elseif($tahap3->nilai_tes_iq != 0 && $tahap3->nilai_tes_kepribadian == 0)
							<a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
						@else
							<span class="btn btn-success">Sudah Di Ikuti</span>
						@endif
					</div>
				</div> 
				@endif

				{{-- tes tahap ke empat --}}
				@if (!empty($tahap4) && $tahap4->status == "lolos")
				<div class="row px-4">
					<div class="col-md-1 py-2"><i class="fas fa-th"></i></div>
					<div class="col-md-3 py-2">tes tahap Ke Empat</div>
					<div class="col-md-4 py-2">
						@isset($tahap5)
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
						@endisset
					</div>
					<div class="col-md-4 my-2">
						@isset($tahap5)
						@if ($tahap5->status == null)
							<a href="{{ route('tahap-lima-wawancara') }}" class="btn btn-primary">Info Wawancara</a>
						@else
							<span class="btn btn-success">Sudah Di Ikuti</span>
						@endif
						@endisset
					</div>
				</div> 
				@endif

			{{-- selamat --}}
			@if (!empty($tahap5) && $tahap5->status == "lolos")
			<div class="row px-4">
				<div class="col-md-1 py-2 text-success"><i class="fas fa-th"></i></div>
				<div class="col-md-11 text-success"><smal><strong><i>Selamat Anda Lolos Seleksi, Unuk Info Selanjutnya Akan Diasampaikan Melalui WhatsApp</i></strong></smal></div>
			</div> 
			@elseif(!empty($tahap5) && $tahap5->status == "tidak")
			<div class="row px-4">
				<div class="col-md-1 py-2 text-danger"><i class="fas fa-th"></i></div>
				<div class="col-md-11 text-danger"><smal><strong><i>Mohon Maaf Anda Tidak Lolos Tes Seleksi</i></strong></smal></div>
			</div> 
			@endif
		</div>
	</div>
</div>
@endsection
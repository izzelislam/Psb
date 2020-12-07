@extends('front.dashboard.pages.app')

@section('title','User Dashboard')

@section('page-title','Dashboard')

@section('bread-crumb')
	<div class="section-header-breadcrumb">
		<div class="breadcrumb-item">Dashboard</div>
	</div>
@endsection

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
					
					@elseif( isset($tahap4->status) == 'tidak')
						<h2>Mohon Maaf, {{ Auth::user()->name }}! .</h2>
						<p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya
						</p>				
					@endif
				@else
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
<div class="row">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
			<h4>Profile</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
								<i class="fas fa-user"></i>
								</div>
							</div>
							<input type="text" class="form-control phone-number" readonly value="{{ $tahap1 ? $tahap1->nama : null }}">
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
								<i class="fas fa-location-arrow"></i>
								</div>
							</div>
							<input type="text" class="form-control phone-number text-align-left" readonly value="{{ isset($tahap1->user->biodata2) ? $tahap1->user->biodata2->alamt_lengkap :'' }}">
								
							</div>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Email</label>
							<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
								<i class="fas fa-envelope"></i>
								</div>
							</div>
							<input type="text" class="form-control phone-number" readonly value="{{ Auth::user()->email }}">
							</div>
						</div>
						<form 
						@if (isset($tahap1))
							action="{{ route('no_wa.edit',$tahap1->id) }}"
						@endif
						method="POST">
						<div class="form-group">
							<label>No WhatsApp</label>
							<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
								<i class="fas fa-phone"></i>
								</div>
							</div>
								@csrf
								@method('PUT')
								<input type="text" name="no_wa" class="form-control phone-number" value="{{ $tahap1 ? $tahap1->no_wa : null }}" {{ $tahap1 ? $tahap1->no_wa : 'readonly' }}>
								
								@if (isset($tahap1->no_wa))
									<button class="btn btn-sm btn-primary ">Update no wa</button>
								@endif
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('front.dashboard.pages.app')

@section('title','User Dashboard')

@section('page-title','Dashboard')
    
@section('bread-crumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Dashboard</div>
    </div>
@endsection

@section('content')
@if ($tahap1 == 0)
<div class="row">
    <div class="col">
        <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
            <div class="alert-title">Selamat datang {{ Auth::user()->name }}</div>
            untuk melakukan tes pertama anda silahkan klik tombol di bawah ini <br>  <a href="{{ route('tahap-pertama') }}" class="btn btn-sm btn-icon icon-left btn-success mt-2"> <i class="fas fa-check"></i> Ikuti tes</a>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card author-box card-primary">
            <div class="card-body">
                <div class="author-box-left">
                    <img alt="image" src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a>
                </div>
                <div class="author-box-details">
                    <div class="author-box-name">
                    <a href="#">{{ Auth::user()->name }}</a>
                    </div>
                    <div class="author-box-description">
                    <div class="mb-2 mt-3"><div class="text-small font-weight-bold"><i class="fas fa-sign-out-alt mr-1"></i>Keluar</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-8">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Profile</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control phone-number">
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
                    <input type="text" class="form-control phone-number">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control phone-number">
                    </div>
                </div>
                <div class="form-group">
                    <label>No WhatsApp</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control phone-number">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
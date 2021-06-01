@extends('front.main.pages.app')

@section('title','Pendaftaran Santri Baru')
    
@section('content')
    <section>
        <div class="nav-bg mb-5">
        <div class="container">
            <div class="row">
            <div
                class="col-md-10 col-sm-12 text-light text-center m-auto bg-hero pt-5"
            >
                <div class="row">
                <div class="col">
                    <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">Selamat Datang Di Halaman Pendaftaran</h1>
                </div>
                </div>
                <div class="row my-3">
                <div class="col-md-8 col-sm-12 m-auto ">
                    <p data-aos="zoom-in-up" data-aos-delay="500" data-aos-duration="1000">
                    Untuk melakukan pendaftaran silahkan login atau buat akun jika
                    anda belum mempunyai akun sebelunya!.
                    </p>
                </div>
                </div>
                <div class="row">
                <div class="col d-md-block d-none">
                    <a href="{{ route('login') }}" class="btn btn-masuk px-5 mx-2" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="1000">MASUK</a>
                    <a href="{{ route('register') }}" class="btn btn-daftar px-5 mx-2" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="1000">DAFTAR</a>
                </div>

                <div class="col d-md-none d-sm-block">
                    <a href="{{ route('login') }}" class="btn btn-masuk px-5 mx-2" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="1000">MASUK</a>
                    <a href="{{ route('register') }}" class="btn btn-daftar px-5 mx-2 my-4" data-aos="zoom-in-up" data-aos-delay="1000" data-aos-duration="1000">DAFTAR</a>
                </div>

                </div>
                <div class="row mt-5">

                <div class="col m-auto ">
                    <div class="d-none d-md-block">
                        {{-- <img src="{{ asset('front/assets/img/book.png') }}" class="book" style="width: 45%;
                        margin-bottom: -70px;" alt="" data-aos="zoom-in-up" data-aos-delay="1500" data-aos-duration="1000" /> --}}
                        <iframe class="book" width="560" height="315" src="https://www.youtube.com/embed/Aa4oPlkvxMY" title="YouTube video player"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="d-sm-block d-md-none">
                        <iframe class="book" width="295" height="172" src="https://www.youtube.com/embed/Aa4oPlkvxMY?&autoplay=1" title="YouTube video player"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="container my-5 py-5 px-5 ">
            <div class="row justify-content-between card-info">
                <div class="col-md-3 col-sm-12 text-light text-center p-3 mb-2 card-1 shadow" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">
                    <i style="font-size: 55px" class="mt-2 fa fa-user-graduate"></i>
                    <p><h5>Jumlah Pendaftar</h5>
                    <h6>{{ $pendaftar }} Orang</h6></p>
                </div>
                <div class="col-md-3 col-sm-12 text-light text-center p-3 mb-2 card-2 shadow" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">
                    <i style="font-size: 55px" class="mt-2 fa fa-calendar"></i>
                    <p><h5>Pendaftaran Dibuka</h5>
                    <h6>{{ $gel }}</h6></p>
                </div>
                <div class="col-md-3 col-sm-12 text-light text-center p-3 mb-2 card-3 shadow " data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">
                    <i style="font-size: 55px" class="mt-2 fa fa-question"></i>
                    <p><h5>Question & Answer</h5>
                    <h6>selengkapnya</h6></p>
                </div>
            </div>
        </div>
        <div class="nav-bg sub-cap">
            <div class="container">
                <div class="row p-5 justify-content-around">
                    <div class="col-md-7 col-sm-12 text-right py-3 text-light">
                        <p data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
                            Pondok Informatika Al-Madinah membuka penerimaan santri baru yang siap menjadi ahli IT yang bertauhid lurus, mencintai sunnah, berakhlaq mulia serta profesional dan siap membela Islam dengan keahlian dan mau mendedikasikan waktu dan tenaganya untuk da’wah Islam.
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-12 align-self-center" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000">
                        <a href="https://pondokinformatika.com/psb/" target="blank" class="btn btn-daftar px-4">INFO LEBIH LANJUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
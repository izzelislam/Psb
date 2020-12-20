<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Daftar</title>

  @stack('head-style')
  @include('admin.layouts.style')
  @stack('end-style')
  <style>
    b{
      color: red;
    }
  </style>
</head>

<body>
   <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 col-12 m-auto">
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Daftar</h4></div>
              @if (session('sukses-buat'))
                  <div class="alert alert-success">
                    {{ session('sukses-buat') }} <br>
                    <a href="{{ route('login') }}"> <b style="color: #fff;"> <i class="fas fa-arrow-left mr-2"></i> login</b> </a>
                  </div>
              @endif        
              <div class="card-body">
                <form method="POST" action="{{ route('register-proses') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="nama_penguna">Nama Penguna</label>
                    <input id="nama_penguna" value="{{ old('name') }}" type="text" class="form-control" name="name" tabindex="1" required autofocus placeholder="contoh : budi">
                    <div class="invalid-feedback">
                      Masukkan Username Anda
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" value="{{ old('nama') }}" class="form-control" name="nama" tabindex="1" required autofocus placeholder="contoh : Budi Sasono">
                    <div class="invalid-feedback">
                      Masukkan Username Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="umur">Tanggal Lahir</label>
                    <input id="umur" type="date" value="{{ old('umur') }}" placeholder="contoh : 20" class="form-control" name="umur" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Masukkan Username Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="keluarga">Keluarga</label>
                      <select name="keluarga" class="custom-select">
                        <option value="">-- KELUARGA --</option>
                        <option value="tidak-mampu">TIDAK-MAMPU</option>
                        <option value="mampu">MAMPU</option>
                      </select>
                    <div class="invalid-feedback">
                      Masukkan Username Anda
                    </div>
                  </div>
                                    
                  <div class="form-group">
                    <label for="no_wa">No WhatssApp</label>
                    <input id="no_wa" value="{{ old('no_wa') }}" type="number" class="form-control" name="no_wa" tabindex="1" required autofocus placeholder="contoh : 085823945673">
                    <div class="invalid-feedback">
                      Masukkan Username Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" value="{{ old('email') }}" placeholder="contoh : budi@mail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                    
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }} 
                      </div>
                    @enderror

                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }} 
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="jenis-kelamin"
                      >Jenis Kelamin, Wanita Belum Diterima <b>*</b></label
                    >
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="jenis_kelamin"
                        id="jenis_kelamin"
                        value="laki-laki"
                        required
                        
                      />
                      <label class="form-check-label" for="jenis_kelamin">
                        Laki-Laki
                      </label>
                      <div class="invalid-feedback">
                        jenis kelamin harus di isi
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Daftar
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; pondok Informatika 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @stack('head-script')
  @include('admin.layouts.script')
  @stack('end-script')

</body>
</html>

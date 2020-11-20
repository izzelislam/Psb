<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Daftar</title>

  @stack('head-style')
  @include('admin.layouts.style')
  @stack('end-style')
</head>

<body>
   <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Daftar</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register-proses') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Nama</label>
                    <input id="email" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Masukkan Username Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Masukkan Email Anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
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

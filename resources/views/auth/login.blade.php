<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Login</title>

  @stack('head-style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css')}}">
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
              <div class="card-header"><h4>Masuk</h4></div>
              @if (session('sukses'))
                  <div class="alert alert-success">
                    {{ session('sukses') }}
                  </div>
              @elseif(session('sukses-warning'))
                  <div class="alert alert-warning">
                    {{ session('sukses-warning') }}
                  </div>
              @elseif(session('sukses-danger'))
                  <div class="alert alert-danger">
                    {{ session('sukses-danger') }}
                  </div>
                
              @endif

              @if (session('sukses-daftar'))
                  <div class="alert alert-success">
                    {{ session('sukses-daftar') }} <br>
                    <a href="{{ route('login') }}" class="text-light"><b class="text-white">Login</b></a>
                  </div>
              @endif 

              <div class="card-body">
                <form method="POST" action="{{ route('login-proses') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                     Masukkan email anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      {{-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> --}}
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="row d-flex ">
                      <div class="col">
                        <input
                            class="form-check-input ml-1"
                            type="checkbox"
                            onclick="myFunction()"
                        />
                        <small class="ml-4">show password</small>
                      </div>
                    </div>
                    <div class="invalid-feedback">
                      Masukkan password anda
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Masuk
                    </button>
                  </div>
                </form>
                <div class="row">
                  <div class="col d-flex justify-content-center">
                    <a href="{{ route('password-getemail') }}"><small class="tex-center">Lupa password ?</small></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-3 text-muted text-center">
              Belum Punya Akun? <a href="{{ route('register') }}">Buat</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; pondok Informatika {{ date('Y') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @stack('head-script')
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
  @stack('end-script')

</body>
</html>

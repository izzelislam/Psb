@component('mail::message')
<h1>Hallo !</h1>
Silahkan Klik tombol dibawah ini untuk melakukan ResetPassword anda.

@component('mail::button', ['url' => url('/reset-password', $user['token'])])
Reset password
@endcomponent

atau klik link di bawah ini
<br>
<a href="{{ route('getPassword', $user['token']) }}">Reset Password</a>


Terimakasih,<br>
Admin
@endcomponent




{{-- <!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

    <title>Hello, world!</title>
  </head>
  <body>
     
    <div class="w-50 m-auto">
      <div class="card p-5">
        <img style="width: 150px" src="{{ asset('front/assets/img/pita_avatar.png') }}" alt="">

        <div class="div">
          <h3>halo !</h3>
          <p>
            untuk melakukan reset password silahkan klik tombol dibawah ini
          </p>
          <br>
          <div class="text-center">
            <a href="{{ route('getPassword', $user['token']) }}" class="btn btn-success">Reset password</a>
          </div>
          <p>
            atau klik link di bawah jika tombol di atas tidak berfungsi
          </p>
          <a href="{{ route('getPassword', $user['token']) }}"></a>
        </div>
      </div>
    </div>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html> --}}
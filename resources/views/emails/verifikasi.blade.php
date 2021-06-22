<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

    <title>Hello, world!</title>
  </head>
  <body>
     
    <div class="w-50 m-auto">
      <div class="card p-5">
        {{-- logo --}}
        <img style="width: 100px" src="{{ asset('front/assets/img/pita_avatar.png') }}" alt="">
        {{-- text --}}

        <div class="div">
          <h3>halo !</h3>

          <p>
            untuk melakukan reset password silahkan klik link dibawah ini
          </p>
          <br>
          <br>
          <a href="{{ route('getPassword', $user['token']) }}">
            {{ route('getPassword', $user['token']) }}
          </a>
          <br>
          <br>
          {{ date('Y') }} {{ 'PondokInformatika-AlMadinah' }}. @lang('All rights reserved.')
          

        </div>
      </div>
    </div>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
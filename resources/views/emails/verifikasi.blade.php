@component('mail::message')
<h1>Hallo !, {{ $user->name }}</h1>
Silahkan Klik tombol dibawah ini untuk melakukan verifikasi email anda.

@component('mail::button', ['url' => url('/verifikasi/email', $user->verifyuser->token)])
Verifikasi Email
@endcomponent
jika Anda tidak membuat akun, abaikan saja email ini.<br>
Terimakasih,<br>
Admin
<br>
<br>
<small>
    jika tombol di atas bermasalah , copy dan paste link ini di web browser anda
    <a href="{{ url('/verifikasi/email', $user->verifyuser->token) }}">{{ url('/verifikasi/email', $user->verifyuser->token) }}</a>
</small> 
@endcomponent

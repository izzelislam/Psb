@component('mail::message')
<h1>Hallo !</h1>

Silahkan Klik tombol dibawah ini untuk melakukan verifikasi email anda.

@component('mail::button', ['url' => route('verifikasi-email')])
Verifikasi Email
@endcomponent
jika Anda tidak membuat akun, abaikan saja email ini.
Thanks,<br>
Admin
<br>
<br>
<small>
    jika tombol di atas bermasalah , copy dan paste link ini di web browser anda
</small> 
@endcomponent

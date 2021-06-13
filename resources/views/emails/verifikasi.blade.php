@component('mail::message')
<h1>Hallo !</h1>
Silahkan Klik tombol dibawah ini untuk melakukan ResetPassword anda.

@component('mail::button', ['url' => url('/reset-password', $user['token'])])
Reset password
@endcomponent
Terimakasih,<br>
Admin
@endcomponent

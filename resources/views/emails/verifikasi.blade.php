@component('mail::message')
# hello

Silahkan Klik tombol dibawah ini untuk melakukan ResetPassword anda.

@component('mail::button', ['url' => ''])
Reset Password
@endcomponent

Terimakasih,<br>
Admin
@endcomponent
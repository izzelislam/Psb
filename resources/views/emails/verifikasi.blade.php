{{-- @component('mail::message')
<h1>Hallo !</h1>
Silahkan Klik tombol dibawah ini untuk melakukan ResetPassword anda.

@component('mail::button', ['url' => url('/reset-password', $user['token'])])
Reset password
@endcomponent

atau klik link di bawah ini
<br>


Terimakasih,<br>
Admin
@endcomponent --}}


{{-- <a href="{{ route('getPassword', $user['token']) }}">Reset Password</a> --}}

@component('mail::message')
# hello

Silahkan Klik tombol dibawah ini untuk melakukan ResetPassword anda.

@component('mail::button', ['url' => url('/reset-password', $user['token'])])
Reset Password
@endcomponent

Terimakasih,<br>
Admin
@endcomponent
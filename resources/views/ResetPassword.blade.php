{{-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


@component('mail::message')
<h1>Hallo !</h1>
Silahkan Klik tombol dibawah ini untuk melakukan ResetPassword anda.

@component('mail::button', ['url' => url('/reset-password', $user['token'])])
Reset password
@endcomponent

atau klik link di bawah ini
<br>


Terimakasih,<br>
Admin
@endcomponent

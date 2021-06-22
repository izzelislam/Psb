@component('mail::message')
# Halo

Klik tombol di bawah ini untuk reset password

@component('mail::button', ['url' => url('reset-password', $user['token'])])
Reset Password
@endcomponent

Thanks,<br>
Admin
@endcomponent
@component('mail::message')
# Halo

Untuk melakukan reset password silahkan klik tombol dibawah ini

@component('mail::button', ['url' => '#'])
Reset Password
@endcomponent

atau klik dibawah ini jika tombol di atas tidak berfungsi
<small>
  <a href="{{ route('getPassword', $user['token']) }}">{{ route('getPassword', $user['token']) }}</a>
</small>

Terimakasih,<br>
Admin
@endcomponent
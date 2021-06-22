<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://pondokinformatika.com/wp-content/uploads/2016/10/PONDOK-IT-ALMADINAH-PNG-copy.png" style="width: 100px;" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

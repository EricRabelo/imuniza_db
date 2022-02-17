<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/site/img/logo-azul.png') }}" class="logo" alt="Automic Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

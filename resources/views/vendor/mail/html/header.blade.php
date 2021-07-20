<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img src="{{ $url }}/img/logo_inyawa.jpg" class="logo" alt="Inyawa Logo">
@if (trim($slot) === 'Inyawa')
{{-- aquí iba el logo de laravel --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

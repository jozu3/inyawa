<tr>
<td class="header">
		
<a href="{{ $url }}" style="display: inline-block;">
	<center style="border-radius: 50%;">
		<img src="{{ $url }}/img/logo_inyawa.jpg" width="120px" class="logo" alt="Inyawa Logo">
	</center>
@if (trim($slot) === 'Inyawa')
{{-- aquí iba el logo de laravel --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

<tr>
<td class="header">
		
<a href="{{ $url }}" style="display: inline-block;">
	<center style="">
		<img src="{{ $url }}/img/logo_inyawa.jpg" style="border-radius: 50% !important; max-height: 150px!important;height: 150px!important; width:150px!important; " class="logo" alt="Inyawa Logo">
	</center>
@if (trim($slot) === 'Inyawa')
{{-- aquí iba el logo de laravel --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

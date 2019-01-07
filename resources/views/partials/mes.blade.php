@php
	$meses = [
		'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
		'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
	]
@endphp
<div class="col-6">
@for ($i = 0; $i < 6; $i++)
	<a href="{{ route('consulta.despesa', ['ano' => $consulta['ano'], 'mes' => $i]) }}"
		class="btn btn-block btn-hover btn-info">
		{{ ($i + 1) . ' - ' . $meses[$i] }}
	</a>
@endfor
</div>
<div class="col-6">
@for ($i = 6; $i < 12; $i++)
	<a href="{{ route('consulta.despesa', ['ano' => $consulta['ano'], 'mes' => $i]) }}"
		class="btn btn-block btn-hover btn-info">
		{{ ($i + 1) . ' - ' . $meses[$i] }}
	</a>
@endfor
</div>
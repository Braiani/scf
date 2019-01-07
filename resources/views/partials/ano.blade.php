@for ($i = date('Y'); $i > 2010; $i--)
	<div class="col-6 offset-3 p-2">
		<a href="{{ route('consulta', ['ano' => $i]) }}"
			class="btn btn-block btn-hover btn-info">{{ $i }}</a>
	</div>
@endfor
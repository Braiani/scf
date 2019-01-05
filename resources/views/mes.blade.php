@extends('layouts.app')

@section('content')
@php
	$meses = [
		'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
		'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
	]
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mg-head">
				<div class="card">
					<div class="card-header">Consulta</div>
					<div class="card-body">
						<div class="row">
							<div class="col-3 p-2">
								<a href="{{ route('home') }}" class="btn btn-block btn-info">Voltar</a>
							</div>
							<div class="col-3 offset-6 p-2">
								<a href="{{ route('consulta.ano', $ano) }}" class="btn btn-block btn-info">{{ $ano }}</a>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
							@for ($i = 0; $i < 6; $i++)
								<div class="col-12 p-2">
									<a href="{{ route('consulta.mes', [$ano, $i]) }}"
										class="btn btn-block btn-success">
										{{ ($i + 1) . ' - ' . $meses[$i] }}
									</a>
								</div>
							@endfor
							</div>
							<div class="col-6">
							@for ($i = 6; $i < 12; $i++)
								<div class="col-12 p-2">
									<a href="{{ route('consulta.mes', [$ano, $i]) }}"
										class="btn btn-block btn-success">
										{{ ($i + 1) . ' - ' . $meses[$i] }}
									</a>
								</div>
							@endfor
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection

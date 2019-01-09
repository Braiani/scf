@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mg-head">
				<div class="card">
					<div class="card-header">Consulta</div>
					<div class="card-body">
						@if ($consulta['ano'] != null)
						<div class="row">
							<div class="col-4 p-2">
								<a href="{{ route('consulta') }}" 
									class="btn btn-block btn-pink">Voltar</a>
							</div>
							<div class="col-4 btn-data p-2">
								<a href="{{ route('consulta', ['ano' => $consulta['ano']]) }}" 
										class="btn btn-block btn-pink">
									{{ $consulta['ano'] }}
								</a>
							</div>
						</div>
						@endif
						<div class="row">
						@includeWhen(($consulta['inicio']), 'partials.ano')
						@includeWhen(($consulta['ano'] != null), 'partials.mes')
						</div>
						@if ($consulta['inicio'])
						<div class="row">
							<div class="col-6 p-2">
								<a href="{{ route('relatorios.index') }}" class="btn btn-block btn-pink">Gráfico Anual</a>
							</div>
							<div class="col-6 p-2">
								<a href="#" class="btn btn-block btn-pink">Gráfico Mensal</a>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection

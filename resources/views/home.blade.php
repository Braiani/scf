@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mg-head">
				<div class="card">
					<div class="card-header">Consulta</div>
					<div class="card-body">
						<div class="row">
						@for ($i = date('Y'); $i > 2010; $i--)
							<div class="col-6 offset-3 p-2">
								<a href="{{ route('consulta.ano', $i) }}" class="btn btn-block btn-success">{{ $i }}</a>
							</div>
						@endfor
						</div>
						<div class="row">
							<div class="col-6 p-2">
								<a href="#" class="btn btn-block btn-info">Gráfico Anual</a>
							</div>
							<div class="col-6 p-2">
								<a href="#" class="btn btn-block btn-info">Gráfico Mensal</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection

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
        <div class="col-md-12">
            <div class="mg-head">
				<div class="card">
					<div class="card-header">Consulta</div>
					<div class="card-body">
						<div class="row">
							<div class="col-3 p-2">
								<a href="{{ route('home') }}" class="btn btn-block btn-info">Voltar</a>
							</div>
							<div class="col-3 offset-6 p-2">
								<a href="{{ route('consulta.mes', [$ano, $mes]) }}"
									class="btn btn-block btn-info">{{ $meses[$mes] . '/' . $ano }}</a>
							</div>
						</div>
						<div class="row">
							<div class="col-12 p-2">
								<table class="table table-bordered table-hover">
									<thead>
										<th>Data</th>
										<th>Descrição</th>
										<th>Valor</th>
										<th>Ações</th>
									</thead>
									<tbody>
										@for ($i = 0; $i < 15; $i++)
										<tr>
											<td>{{ $i + 1 }}/03/2019</td>
											<td>Dolorem distinctio rerum qui nam temporibus animi neque.</td>
											<td>R$ 125,00</td>
											<td>
												<button class="btn btn-warning btn-sm">
													<i class="fa fa-eye"></i> Ver
												</button>
												<button class="btn btn-success btn-sm">
													<i class="fa fa-edit"></i> Editar
												</button>
											</td>
										</tr>
										@endfor
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection

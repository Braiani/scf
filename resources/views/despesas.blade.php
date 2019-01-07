@extends('layouts.app')

@section('content')
@php
$meses = [
	'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
	'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
];
$dataLoop = Carbon\Carbon::createFromDate($ano, $mes + 1, 1);
$dataSelecionada = Carbon\Carbon::createFromDate($ano, $mes + 1, 1);
// dd($despesas);
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mg-head">
				<div class="card">
					<div class="card-header">Despesas</div>
					<div class="card-body">
						<div class="row">
							<div class="col-4 p-2">
								<a href="{{ route('consulta') }}" 
									class="btn btn-block btn-pink">Voltar</a>
							</div>
							<div class="col-4 offset-4 p-2">
								<a href="{{ route('consulta', ['ano' => $ano]) }}"
									class="btn btn-block btn-pink">{{ $meses[$mes] . '/' . $ano }}</a>
							</div>
						</div>
						<div class="row">
							<div class="col-12 p-4">
								@if (session()->has('sucesso'))
									<div class="alert alert-success">
										<i class="far fa-check-circle"></i> {{ session()->get('sucesso') }}
									</div>
								@endif
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<th>Data</th>
											<th>Descrição</th>
											<th>Valor</th>
											<th>Ações</th>
										</thead>
										<tbody>
											@for ($i = 0; $i < 31; $i++)
												@php
													$diaDespesas = $despesas->filter(function ($item, $key) use ($dataLoop) {
														return $item->data->isSameDay($dataLoop);
													});
													// dump($diaDespesas);
												@endphp
												@if ($diaDespesas->isEmpty())
													<tr>
														<td>{{ $dataLoop->format('d/m/Y') }}</td>
														<td>Nenhuma despesa cadastrada!</td>
														<td> -- </td>
														<td>
															<a href="{{ route('despesas.create', $dataLoop->format('Y-m-d')) }}" class="btn btn-info btn-sm">
																<i class="fa fa-plus"></i> Adicionar
															</a>
														</td>
													</tr>
												@else
													@foreach ($diaDespesas as $despesa)
														<tr>
															<td>{{ $despesa->data->format('d/m/Y') }}</td>
															<td>{{ $despesa->descricao }}</td>
															<td>R${{ number_format($despesa->valor, 2, ',', '.') }}</td>
															<td>
																<a href="{{ route('despesas.edit', $despesa->data->format('Y-m-d')) }}"
																	class="btn btn-success btn-sm">
																	<i class="fa fa-edit"></i> Editar
																</a>
															</td>
														</tr>
													@endforeach
												@endif
												@php
													$dataLoop->addDay();
													if (!$dataLoop->isSameMonth($dataSelecionada)) {
														break;
													}
												@endphp
											@endfor
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="car-footer">
						<hr>
						<div class="row justify-content-end">
							<div class="col-sm-4">
								<div class="box-total text-center">
									Total no mês: R$ {{ number_format($total, 2, ',', '.') }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection

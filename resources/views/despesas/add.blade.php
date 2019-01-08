@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 mg-head">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="card">
				<div class="card-header">
					<span class="fa fa-plus"></span> Adicionar despesa
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h3 class="h3 text-muted">Lista de despesa:</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="{{ route('despesas.store', $data) }}" method="post">
								{{ csrf_field() }}
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<th>Data</th>
											<th>Descrição</th>
											<th>Valor</th>
											<th>Ações</th>
										</thead>
										<tbody>
											<tr>
												<td>
													<p class="h3 text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d',$data)->format('d/m/Y') }}</p>
												</td>
												<td>
													<input type="text" name="descricao[]" class="form-control border-dark" placeholder="Descreva a despesa" required>
												</td>
												<td>
													<input type="number" step="any" min="0" name="valor[]" class="form-control border-dark" placeholder="Valor" required>
												</td>
												<td>
													<button class="btn btn-info" onclick="addLinha()" type="button">
														<span class="fa fa-plus"></span>
													</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-block btn-info">Salvar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
	function newLineHtml(){
		return [
			'<tr>' +
				'<td>' +
					'<p class="h3 text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d',$data)->format('d/m/Y') }}</p>' +
				'</td>' +
				'<td>' +
					'<input type="text" name="descricao[]" class="form-control border-dark" placeholder="Descreva a despesa"  required>' +
				'</td>' +
				'<td>' +
					'<input type="number" step="any" min="0" name="valor[]" class="form-control border-dark" placeholder="Valor" required>' +
				'</td>' +
				'<td>' +
					'<button class="btn btn-info" onclick="addLinha()" type="button">' +
						'<span class="fa fa-plus"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onclick="removeLinha(this)" type="button">' +
						'<span class="fa fa-minus"></span>' +
					'</button>' +
				'</td>' +
			'</tr>'
		].join('');
	}
	function addLinha(){
		$(newLineHtml()).hide().appendTo('tbody').fadeIn(800);
	}
	function removeLinha(item){
		var tr = $(item).closest('tr');

		tr.fadeOut(600, function() {
			tr.remove();  
		});
	}
</script>
@endpush
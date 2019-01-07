@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 mg-head">
			<div class="card">
				<div class="card-header">
					<span class="fa fa-edit"></span> Editar despesas
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h3 class="h3 text-muted">Lista de despesa:</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="{{ route('despesas.update', $data) }}" method="post">
								@method('PUT')
								{{ csrf_field() }}
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<th>Data</th>
											<th>Descrição</th>
											<th>Valor</th>
											<th>Mais</th>
										</thead>
										<tbody>
											@foreach ($despesas as $despesa)
												<tr>
													<td>
														<input type="date" name="data[]" class="form-control border-dark" value="{{ $despesa->data->format('Y-m-d') }}">
													</td>
													<td>
														<input type="text" name="descricao[]" class="form-control border-dark" value="{{ $despesa->descricao }}" placeholder="Descreva a despesa">
													</td>
													<td>
														<input type="number" step="any" min="0" name="valor[]" class="form-control border-dark" 
															value="{{ $despesa->valor }}" placeholder="Valor" required>
													</td>
													<td>
														<button class="btn btn-info" onclick="addLinha()" type="button">
															<span class="fa fa-plus"></span>
														</button>
														<button type="button" class="btn btn-danger" onclick="removeModal({{ $despesa->id }})" 
																data-toggle="modal" data-target="#deleteModal">
															<i class="fa fa-minus"></i>
														</button>
													</td>
												</tr>
											@endforeach
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
			<!-- Modal -->
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Apagar despesa?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="h3">Você tem certeza que deseja apagar essa despesa?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<form action="#" id="delete_form" method="POST">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger">Apagar</button>
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
					'<input type="date" name="data[]" class="form-control border-dark" value="{{ $data }}" required>' +
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
	function removeModal(id){
		$('#delete_form')[0].action = '{{ route('despesas.delete', ['id' => '__id']) }}'.replace('__id', id);
	}
</script>
@endpush
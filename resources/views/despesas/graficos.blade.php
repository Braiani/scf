@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<div class="mg-head">
				<div class="card">
					<div class="card-header">Gráfico anual</div>
					<div class="card-body">
						<div class="row">
							<div class="col-4 p-2">
								<a href="{{ route('consulta') }}" 
									class="btn btn-block btn-pink">Voltar</a>
							</div>
						</div>
						<div class="row">
							{!! $chart->container() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
<script>
	$(document).ready(function(){
		$("#{{ $chart->id }}").on('click', function(){
			var elem = $(this);
			//alert(elem);
		})
	});
</script>
@endpush
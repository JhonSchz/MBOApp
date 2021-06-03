@extends('layouts.plantilla')

@section('title')
Averia
@endsection

@section('head')
@endsection

@section('content')
<div class="card">
	<div class="card-header"><p class="h1" style="text-align: center;"> Averias </p></div>
	<a class="btn btn-primary" href="{{ route('averia.create') }}" role="button"><i class="far fa-plus-square"></i> &nbsp; Crear nueva averia </a>
	
	<div class="card-body">
		<table id="myTable" class="display nowrap" style="width:100%">
			<thead>
				<tr>
					<th></th>
					<th>Id</th>
					<th>Estatus averia</th>
					<th>Empresa asociada</th>
					<th>Descripción de la avería</th>
				</tr>
			</thead>
			<tbody>
			  @foreach($averias as $averia)
				<tr>
					<td>
					  <!-- Edit -->
						<a href="{{ route('averia.edit' , $averia->id_averia) }}">
							<button type="button" class="btn btn-outline-info" style="margin-left: 1em; padding: 1px 4px"><i class="fas fa-edit"></i></button>
						</a>
					  <!-- Delete -->
						<form class="formDelete" action="{{ route('averia.destroy', $averia->id_averia) }}"
							data-action="{{ route('averia.destroy',  $averia->id_averia) }}" method="POST">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn btn-outline-danger" style="margin-left: 1em; padding: 1px 6px"><i class="fas fa-trash"></i></button>
						</form>
					</td>
					<td>{{ $averia->id_averia }}</td>
					<td>{{ $averia->estatus_averia }}</td>
					<td>{{ $averia->empresa->nombre_empresa }}</td>
					<td>{{ $averia->descripcion_averia }}</td>
				</tr>
			  @endforeach
			</tbody>
		</table>
	</div>
</div>

<script>
$(document).ready( function () {
	$('#myTable').DataTable({ 
		language: {
			"decimal": "",
			"emptyTable": "No se encuentran registros",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "<i class='fas fa-search'></i>",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "<i class='fas fa-arrow-right'></i>",
				"previous": "<i class='fas fa-arrow-left'></i>"
			}
		},
		responsive: true 
	});
	$('#nav-averia').css("background", "radial-gradient(circle, #696969 0%, rgba(0,0,0,0) 55%)");
	$('#nav-averia a').css("text-decoration", "underline")
});
</script>
@endsection

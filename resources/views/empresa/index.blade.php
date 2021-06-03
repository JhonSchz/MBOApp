@extends('layouts.plantilla')

@section('title')
Empresa
@endsection

@section('head')
@endsection

@section('content')
<div class="card">
	<div class="card-header"><p class="h1" style="text-align: center;"> Empresas </p></div>
	<a class="btn btn-primary" href="{{ route('empresa.create') }}" role="button"><i class="far fa-plus-square"></i> &nbsp; Alta nueva empresa </a>
	
	<div class="card-body">
		<table id="myTable" class="display nowrap" style="width:100%">
			<thead>
				<tr>
					<th></th>
					<th>Id</th>
					<th>CIF</th>
					<th>Nombre</th>
					<th>Ciudad</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
			  @foreach($empresas as $empresa)
				<tr>
					<td>
					  <!-- Edit -->
						<a href="{{ route('empresa.edit' , $empresa->id_empresa) }}">
							<button type="button" class="btn btn-outline-info" style="margin-left: 1em; padding: 1px 4px"><i class="fas fa-edit"></i></button>
						</a>
					  <!-- Delete -->
						<form class="formDelete" action="{{ route('empresa.destroy', $empresa->id_empresa) }}"
							data-action="{{ route('empresa.destroy',  $empresa->id_empresa) }}" method="POST">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn btn-outline-danger" style="margin-left: 1em; padding: 1px 6px"><i class="fas fa-trash"></i></button>
						</form>
					</td>
					<td>{{ $empresa->id_empresa }}</td>
					<td>{{ $empresa->cif }}</td>
					<td>{{ $empresa->nombre_empresa }}</td>
					<td>{{ $empresa->ciudad_empresa }}</td>
					<td>{{ $empresa->direccion_empresa }}</td>
					<td>{{ $empresa->telefono_empresa }}</td>
					<td>{{ $empresa->email_empresa }}</td>
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
	$('#nav-empresa').css("background", "radial-gradient(circle, #696969 0%, rgba(0,0,0,0) 55%)");
	$('#nav-empresa a').css("text-decoration", "underline")
});
</script>
@endsection
@extends('layouts.plantilla')

@section('title')
Usuario
@endsection

@section('head')
@endsection

@section('content')
<div class="card">
	<div class="card-header"><p class="h1" style="text-align: center;"> Usuarios </p></div>
	<a class="btn btn-primary" href="{{ route('usuario.create') }}" role="button"><i class="far fa-plus-square"></i> &nbsp; Alta nuevo usuario </a>

	<div class="card-body">
		<table id="myTable" class="display nowrap" style="width:100%">
			<thead>
				<tr>
					<th></th>
					<th>Id</th>
					<th>Tipo Usuario</th>
					<th>Estatus</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
				</tr>
			</thead>
			<tbody>
			  @foreach($usuarios as $usuario)
				<tr>
					<td>
					  <!-- Edit -->
						<a href="{{ route('usuario.edit', $usuario->id_usuario) }}">
							<button type="button" class="btn btn-outline-info" style="margin-left: 1em; padding: 1px 4px"><i class="fas fa-edit"></i></button>
						</a>
					  <!-- Delete -->
						<form class="formDelete" action="{{ route('usuario.destroy', $usuario->id_usuario) }}"
							data-action="{{ route('usuario.destroy',  $usuario->id_usuario) }}" method="POST">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn btn-outline-danger" style="margin-left: 1em; padding: 1px 6px"><i class="fas fa-trash"></i></button>
						</form>
					</td>
					<td>{{ $usuario->id_usuario }}</td>
					<td>{{ $usuario->tipo_usuario }}</td>
					<td>{{ $usuario->estatus_usuario }}</td>
					<td>{{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}</td>
					<td>{{ $usuario->email_usuario }}</td>
					<td>{{ $usuario->telefono_usuario }}</td>
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
	$('#nav-usuario').css("background", "radial-gradient(circle, #696969 0%, rgba(0,0,0,0) 55%)");
	$('#nav-usuario a').css("text-decoration", "underline")
} );
	
</script>
@endsection
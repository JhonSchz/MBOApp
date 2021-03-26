@extends('layouts.plantilla')

@section('title')
Empresa
@endsection

@section('head')
@endsection

@section('content')

<a class="btn btn-primary" href="{{ route('empresa.create') }}" role="button"><i class="far fa-plus-square"></i></a>

<table id="myTable" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>CIF</th>
			<th>Nombre</th>
			<th>Ciudad</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	  @foreach($empresas as $empresa)
		<tr>
			<td>{{ $empresa->id_empresa }}</td>
			<td>{{ $empresa->cif }}</td>
			<td>{{ $empresa->nombre_empresa }}</td>
			<td>{{ $empresa->ciudad_empresa }}</td>
			<td>{{ $empresa->direccion_empresa }}</td>
			<td>{{ $empresa->telefono_empresa }}</td>
			<td>{{ $empresa->email_empresa }}</td>
            <td>
			  <!-- Edit -->
				<a href="{{ route('empresa.edit' , $empresa->id_empresa) }}">
					<button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
				</a>
			  <!-- Delete -->
                <form class="formDelete" action="{{ route('empresa.destroy', $empresa->id_empresa) }}"
                    data-action="{{ route('empresa.destroy',  $empresa->id_empresa) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
		</tr>
	  @endforeach
	</tbody>
</table>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();	
	//$('li:nth-child(3)').css("background-color", "yellow"); 
} );
	
</script>
@endsection
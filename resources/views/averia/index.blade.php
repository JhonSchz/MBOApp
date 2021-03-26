@extends('layouts.plantilla')

@section('title')
Averia
@endsection

@section('head')
@endsection

@section('content')

<a class="btn btn-primary" href="{{ route('averia.create') }}" role="button"><i class="far fa-plus-square"></i></a>

<table id="myTable" class="display" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Estatus averia (cambiar a colores)</th>
			<th>Empresa asociada</th>
			<th>Descripción de la avería</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	  @foreach($averias as $averia)
		<tr>
			<td>{{ $averia->id_averia }}</td>
			<td>{{ $averia->estatus_averia }}</td>
			<td>{{ $averia->empresa->nombre_empresa }}</td>
			<td>{{ $averia->descripcion_averia }}</td>
            <td>
			  <!-- Edit -->
				<a href="{{ route('averia.edit' , $averia->id_averia) }}">
					<button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
				</a>
			  <!-- Delete -->
                <form class="formDelete" action="{{ route('averia.destroy', $averia->id_averia) }}"
                    data-action="{{ route('averia.destroy',  $averia->id_averia) }}" method="POST">
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

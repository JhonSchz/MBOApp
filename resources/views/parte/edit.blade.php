@extends('layouts.plantilla')

@section('title')
Edit
@endsection

@section('head')
<style>
	.form-group{
		margin-bottom:0;
	}
	.form-group > div{
		margin-bottom: 1rem;
	}
	#breadcrumb {
		background: none;
		margin-top: -1em;
		padding: 0;
		border-bottom: 1px solid black;
	}
	#breadcrumb > ol{
		margin-bottom: 0;
		background: none;
	}
	#breadcrumb a {
		color: #007bff;
	}
</style>
@endsection

@section('content')

<div class="row">
<div class="col-md-10 mx-auto">

<nav id="breadcrumb" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('parte.index') }}">Partes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>
	
<form method="POST" action="{{ route('parte.update', $parte->id_parte ) }}">
  @if ($errors->any())
	<div class="alert alert-danger" role="alert">
		<ul>
		  @foreach ($errors->all() as $error)
			<li> {{ $error }} </li> 
		  @endforeach
		</ul>
	</div>
  @endif
  @csrf
  @method('PUT')
	<div class="form-group row">
		<div class="col-sm-4">
			<label for="id_usuario">Responsable</label>
			<input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="{{ $parte->id_usuario }}">
			<select class="form-control" id="id_usuario_disabled" name="id_usuario_disabled" disabled>
				<option value="{{ $parte->id_usuario }}">{{ $parte->usuario->nombre_usuario }}  {{ $parte->usuario->apellido_usuario }}</option>
			</select>
		</div>
		<div class="col-sm-4">
			<label for="id_empresa">Empresa</label>
			<input type="hidden" class="form-control" id="id_empresa" name="id_empresa" value="{{ $parte->id_empresa }}">
			<select class="form-control" id="id_empresa_disabled" name="id_empresa_disabled" disabled>
				<option value="{{ $parte->id_empresa }}" default>{{ $parte->averia->empresa->nombre_empresa }}</option>
			</select>
		</div>
		<div class="col-sm-4">
			<label for="id_averia">Avería</label>
			<input type="hidden" class="form-control" id="id_averia" name="id_averia" value="{{ $parte->id_averia }}">
			<select class="form-control" id="id_averia_disabled" name="id_averia_disabled" disabled>
				<option value="{{ $parte->id_averia }}" default>{{ $parte->id_averia }}</option>
			</select>
		</div>
	</div>
	
	
	<div class="form-group row">
		<div class="col-sm-4">
			<label for="">Fecha del parte</label>
			<input type="date" class="form-control" id="fecha_parte" name="fecha_parte" value="{{ $parte->fecha_parte }}" required>
		</div>
		<div class="col-sm-4">
			<label for="">Hora del parte</label>
			<input type="time" class="form-control" id="hora_parte" name="hora_parte" value="{{ $parte->hora_parte }}" required>
		</div>
		<div class="col-sm-4">
			<label for="">Horas realizadas</label>
			<input type="number" class="form-control" id="horas_realizadas" name="horas_realizadas" value="{{ $parte->horas_realizadas }}" max="99" required>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-12">
			<label for="">Observaciones</label>
			<textarea class="form-control" id="observaciones" name="observaciones" rows="3" required>{{ $parte->observaciones }}</textarea>
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
	<a href="{{ route('parte.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
	
</div>
</div>

<script>
$(document).ready( function () {
	
	$("#id_empresa").change( function() {
        if ($(this).val() === "") {
            $("#id_averia").prop("disabled", true);
			$("#id_averia").val("");
        } else {
            $("#id_averia").prop("disabled", false);
        
			var empresaId = $(this).val();
			$('#id_averia').empty();
		
			if (empresaId) {
				$.ajax({
					url: "{{ route('getAverias') }}",
					type: 'GET',
					data: { id_empresa: empresaId },
					dataType: 'json',
					success: function (response) {
						$('#id_averia').append('<option value="" default></option>')
						$.each(response.data, function (key, value) {
							$('#id_averia').append("<option value='" + value.id_averia + "'>" + value.id_averia + "</option>");
						});
					},
					error : function(){
						alert('Ha ocurrido un error al buscar las averias');
					}
				});
			}
		}
    });	
	
});
</script>
@endsection
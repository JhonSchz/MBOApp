@extends('layouts.plantilla')

@section('title')
Create
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
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
  </ol>
</nav>
	
<form method="POST" action="{{ route('parte.store') }}">
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
	<div class="form-group row">
		<div class="col-sm-4">
			<label for="">Responsable</label>	
			<select class="form-control" id="id_usuario" name="id_usuario" required>
				<option value="" default></option>
			  @foreach($usuarios as $usuario)
				<option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre_usuario }}  {{ $usuario->apellido_usuario }}</option>
			  @endforeach
			</select>
		</div>
		<div class="col-sm-4">
			<label for="">Empresa</label>
			<select class="form-control" id="id_empresa" name="id_empresa" required>
				<option value="" default></option>
			  @foreach($averias as $averia)
				<option value="{{ $averia->empresa->id_empresa }}">{{ $averia->empresa->nombre_empresa }}</option>
			  @endforeach
			</select>
		</div>
		<div class="col-sm-4">
			<label for="">Avería</label>
			<select class="form-control" id="id_averia" name="id_averia" required disabled>
				<option value="" default></option>
			</select>
		</div>
	</div>
	
	
	<div class="form-group row">
		<div class="col-sm-4">
			<label for="">Fecha del parte</label>
			<input type="date" class="form-control" id="fecha_parte" name="fecha_parte" value="<?= date('Y-m-d'); ?>" required>
		</div>
		
		<div class="col-sm-4">
			<label for="">Hora del parte</label>
			<input type="time" class="form-control" id="hora_parte" name="hora_parte" value="<?= date('H:i'); ?>" required>
		</div>
		
		<div class="col-sm-4">
			<label for="">Horas realizadas</label>
			<input type="number" class="form-control" id="horas_realizadas" name="horas_realizadas" value="1" max="99" required>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-12">
			<label for="">Observaciones</label>
			<textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
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
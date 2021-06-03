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
    <li class="breadcrumb-item"><a href="{{ route('averia.index') }}">Averias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
  </ol>
</nav>
	
<form method="POST" action="{{ route('averia.store') }}">	
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
		<div class="col-sm-6">
			<label for="id_empresa">Empresa asociada</label>	
			<select class="form-control" id="id_empresa" name="id_empresa" required>
				<option value="" default>Seleccione una empresa</option>
			  @foreach($empresas as $empresa)
				<option value="{{ $empresa->id_empresa }}">{{ $empresa->nombre_empresa }}</option>
			  @endforeach
			</select>
		</div>
		<div class="col-sm-6">
			<label for="estatus_averia">Estatus de la avería</label>
			<select class="form-control" id="estatus_averia" name="estatus_averia" required>
				<option value="En espera" default>En espera</option>
				<option value="Pendiente">Pendiente</option>
				<option value="Finalizado">Finalizado</option>
			</select>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-12">
			<label for="descripcion_averia">Descripción de la avería</label>
			<textarea class="form-control" id="descripcion_averia" name="descripcion_averia" rows="3"></textarea>
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
	<a href="{{ route('averia.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
	
</div>
</div>

@endsection
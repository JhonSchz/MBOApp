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
</style>
@endsection

@section('content')

<div class="row">
<div class="col-md-10 mx-auto">
	
<form method="POST" action="{{ route('empresa.store') }}">
  @csrf
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="nombre_empresa">Nombre de la empresa</label>	
			<input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la empresa">
		</div>
		<div class="col-sm-6">
			<label for="cif">CIF</label>
			<input type="text" class="form-control" id="cif" name="cif" placeholder="CIF">
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-6">
			<label for="ciudad_empresa">Ciudad</label>
			<input type="text" class="form-control" id="ciudad_empresa" name="ciudad_empresa" placeholder="Ciudad">
		</div>
		<div class="col-sm-6">
			<label for="direccion_empresa">Dirección</label>
			<input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Dirección">
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-6">
			<label for="email_empresa">Email</label>
			<input type="text" class="form-control" id="email_empresa" name="email_empresa" placeholder="Email">
		</div>
		<div class="col-sm-3">
			<label for="codigo_postal_empresa">Código Postal</label>
			<input type="text" class="form-control" id="codigo_postal_empresa" name="codigo_postal_empresa" placeholder="Código Postal">
		</div>
		<div class="col-sm-3">
			<label for="telefono_empresa">Teléfono de contacto</label>
			<input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa" placeholder="Teléfono">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
	<a href="{{ route('empresa.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
	
</div>
</div>

@endsection
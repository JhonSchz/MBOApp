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
    <li class="breadcrumb-item"><a href="{{ route('empresa.index') }}">Empresas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alta</li>
  </ol>
</nav>
	
<form method="POST" action="{{ route('empresa.store') }}">
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
			<label for="nombre_empresa">Nombre de la empresa</label>	
			<input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la empresa" required>
		</div>
		<div class="col-sm-6">
			<label for="cif">CIF</label>
			<input type="text" class="form-control" id="cif" name="cif" placeholder="CIF" pattern="^[a-zA-Z]{1}\d{7}[a-zA-Z0-9]{1}$" required>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-6">
			<label for="ciudad_empresa">Ciudad</label>
			<input type="text" class="form-control" id="ciudad_empresa" name="ciudad_empresa" placeholder="Ciudad" required>
		</div>
		<div class="col-sm-6">
			<label for="direccion_empresa">Dirección</label>
			<input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" placeholder="Dirección" required>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-6">
			<label for="email_empresa">Email</label>
			<input type="text" class="form-control" id="email_empresa" name="email_empresa" placeholder="Email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required>
		</div>
		<div class="col-sm-3">
			<label for="codigo_postal_empresa">Código Postal</label>
			<input type="text" class="form-control" id="codigo_postal_empresa" name="codigo_postal_empresa" placeholder="Código Postal" pattern="[0-9]{5}" required>
		</div>
		<div class="col-sm-3">
			<label for="telefono_empresa">Teléfono de contacto</label>
			<input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa" placeholder="Teléfono" pattern="[0-9]{9}" required>
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
	<a href="{{ route('empresa.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
	
</div>
</div>

@endsection
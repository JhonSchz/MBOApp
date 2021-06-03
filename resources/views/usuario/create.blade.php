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
    <li class="breadcrumb-item"><a href="{{ route('usuario.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alta</li>
  </ol>
</nav>
	
<form method="POST" action="{{ route('usuario.store') }}">
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
			<label for="nombre_usuario">Nombre</label>
			<input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" required>
		</div>
		<div class="col-sm-6">
			<label for="apellido_usuario">Apellidos</label>
			<input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos" required>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="tipo_usuario">Tipo de Usuario</label>
			<select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
				<option value=""></option>
				<option value="empleado">Empleado</option>
				<option value="encargado">Encargado</option>
				<option value="administrador">Administrador</option>
			</select>
		</div>
		<div class="col-sm-6">
			<label for="telefono_usuario">Teléfono</label>	
			<input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" placeholder="Telefono" pattern="[0-9]{9}" required>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-6">
			<label for="email_usuario">Email</label>	
			<input type="text" class="form-control" id="email_usuario" name="email_usuario" placeholder="Email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" required>
		</div>
		<div class="col-sm-6">
			<label for="contrasena_usuario">Contraseña</label>
			<input type="password" class="form-control" id="contrasena_usuario" name="contrasena_usuario" placeholder="Contrasena" required>
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
	<a href="{{ route('usuario.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
	
</div>
</div>

@endsection
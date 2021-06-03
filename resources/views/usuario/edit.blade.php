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
    <li class="breadcrumb-item"><a href="{{ route('usuario.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>
	
<form method="POST" action="{{ route('usuario.update', $usuario->id_usuario) }}">
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
		<div class="col-sm-6">
			<label for="nombre_usuario">Nombre</label>
			<div class="input-group">
				<span class="input-group-text" id="id_usuario">{{ $usuario->id_usuario }}</span>
				<input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" value="{{ $usuario->nombre_usuario }}" required>
			</div>
		</div>
		<div class="col-sm-6">
			<label for="apellido_usuario">Apellidos</label>
			<input type="text" class="form-control" id="apellido_usuario" name="apellido_usuario" placeholder="Apellidos" value="{{ $usuario->apellido_usuario }}" required>
		</div>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="tipo_usuario">Tipo de Usuario</label>
			<select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
				<option value="empleado" {{ $usuario->tipo_usuario == 'empleado' ? 'selected=selected' : '' }} >Empleado</option>
				<option value="encargado" {{ $usuario->tipo_usuario=='encargado' ? 'selected=selected' : '' }} >Encargado</option>
				<option value="administrador" {{ $usuario->tipo_usuario=='administrador' ? 'selected=selected' : '' }} >Administrador</option>
			</select>
		</div>
		<div class="col-sm-6">
			<label for="telefono_usuario">Teléfono</label>	
			<input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" placeholder="Telefono" value="{{ $usuario->telefono_usuario }}" pattern="[0-9]{9}" required>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-6">
			<label for="email_usuario">Email</label>	
			<input type="text" class="form-control" id="email_usuario_disabled" name="email_usuario_disabled" placeholder="Email" value="{{ $usuario->email_usuario }}" disabled>
			<input type="hidden" class="form-control" id="email_usuario" name="email_usuario" placeholder="Email" value="{{ $usuario->email_usuario }}">
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
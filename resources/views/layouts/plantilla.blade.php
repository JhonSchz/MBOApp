<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	
  <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	
  <!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/fb61ab062f.js" crossorigin="anonymous"></script>
	
  <!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
  <!-- Datatable's links -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- Datatable's responsive -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">  
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	
  <!-- Navbar -->
	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/navbar.css') }}"> 
	
	@yield('head')
	@laravelPWA
</head>
	
<body>
  <nav>
	<ul class="menu">
		<li class="logo"><a href="{{ url('/') }}">Maintenance Back Office APP</a></li>
	  @auth
		<li class="item" id="nav-empresa"><a href="{{ route('empresa.index') }}">Empresas</a></li> 
		<li class="item" id="nav-averia"><a href="{{ route('averia.index') }}">Averias</a></li> 
		<li class="item" id="nav-parte"><a href="{{ route('parte.index') }}">Partes</a></li> 
		<li class="item" id="nav-usuario"><a href="{{ route('usuario.index') }}">Usuarios</a></li>
		<li class="item button"><a href="{{ route('logout') }}">Log Out</a></li> 
	  @else
		<li class="item button secondary"><a href="{{ route('empresa.index') }}">Log In</a></li> -->
	  @endauth
		<li class="toggle"><a href="#"><i class='fas fa-bars'></i></a></li> 
	</ul> 
  </nav>

  <div class="container-fluid">
  @if (session('status')) {{-- Notificacion al crear/editar/eliminar --}}
	<div class="alert alert-info"> {{ session('status') }} </div>
  @endif
	@yield('content')
  </div>

<script>
$(function() { 
	$(".toggle").on("click", function() { 
		if ($(".item").hasClass("active")) { 
			$(".item").removeClass("active"); 
			$(this).find("a").html("<i class='fas fa-bars'></i>");
		} else { 
			$(".item").addClass("active"); 
			$(this).find("a").html("<i class='fas fa-times'></i>");
		} 
	}); 
});
</script>
<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/sw.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}	
</script>
</body>
</html>
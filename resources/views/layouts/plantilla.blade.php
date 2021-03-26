<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	
  <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	
  <!-- Font Awesome -->
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/fb61ab062f.js" crossorigin="anonymous"></script>
	
  <!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Navbar -->
	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/navbar.css') }}"> 
	
  <!-- Datatable's links -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

	@yield('head')
</head>
	
<body>
  <nav>
	<ul class="menu">
		<li class="logo"><a href="#">Maintenance Back Office APP</a></li> 
		<li class="item"><a href="{{ url('inicio') }}">Inicio</a></li> 
		<li class="item"><a href="{{ route('empresa.index') }}">Empresas</a></li> 
		<li class="item"><a href="{{ route('averia.index') }}">Averias</a></li> 
		<li class="item"><a href="#">Partes</a></li> 
		<li class="item"><a href="#">Usuarios</a></li>
	<!--
		<li class="item"><a href="#"></a></li> 
	-->
		<li class="item button"><a href="#">Log In</a></li> 
		<li class="item button secondary"><a href="#">Sign Up</a></li> 
		<li class="toggle"><a href="#"><i class='fas fa-bars'></i></a></li> 
	</ul> 
  </nav>

  <div class="container-fluid">
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

</body>
</html>
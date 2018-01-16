<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default')</title>
	<link rel="stylesheet" href="{{ asset('estilos/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/css/bootstrap.min.css') }}">

	<!-- Latest compiled and minified CSS -->
{{-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
  
  <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}"> 

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

{{-- Icons Materialize --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

{!! MaterializeCSS::include_full() !!}

<link rel="stylesheet" href="{{ asset('/materialize-css/css/materialize.min.css') }}">


  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

  Compiled and minified JavaScript
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script> --}}
</head>
<body>

<header>
    <div class="">
       <img class="logo hidden-md hidden-sm hidden-xs" src="{{ asset('estilos/img/logo.png') }}">
       <img class="logo visible-xs-* visible-sm-* visible-md-* hidden-lg" src="{{ asset('estilos/img/logo.png') }}" width="174" height="40">
    </div>    
  </header>
 
@include('coordinador.modulos.navbar')
  <div class="container">
  	@yield('contenido')
  </div>

{{--   <footer class="footer-distributed">
	<div class="footer-left">
		<p class="footer-links">
			<a href="#">Link1</a> - <a href="#">Link2</a> - <a href="#">Link3</a>
		</p>
		<p>SIGESPI 2017 | Developed by Naty <span class="glyphicon glyphicon-heart-empty"></span></p>
	</div>
</footer>
 --}}

<footer class="footer-distributed">
  <div class="footer-left">
  <p>SIGESPI 2017</p>
    <p class="footer-links">
      <ul>
        <li><a href="#"><span class="glyphicon glyphicon-flag"></span> Facultad de Ingeniería Electromecánica</a></li>
        <li><a href="http://portal.ucol.mx/fie/"><span class="glyphicon glyphicon-map-marker"></span> Dirección: Km 20, carretera Manzanillo-Cihuatlan Ejido El Naranjo Manzanillo, Colima</a></li>       
      </ul>
    </p>
    
  </div>
</footer>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> --}}	

<script>
	$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>


<script>
  $('#ventana').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="/sweetalert/sweetalert.min.js"></script> --}}

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>

{{-- @include('sweet::alert') --}}	


<script src="{{ asset('/materialize-css/js/jquery.js') }}"></script>
<script src="{{ asset('/materialize-css/js/materialize.min.js') }}"></script>

<script src="/sweetalert/sweetalert.min.js"></script>

@include('sweet::alert')

<script>
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>

<script>
  $(document).ready(function(){
    $('#modal1').modal();
  });
</script>
</body>
</html>
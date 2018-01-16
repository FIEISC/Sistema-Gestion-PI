<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Default')</title>
	<link rel="stylesheet" href="{{ asset('estilos/css/my-style.css') }}">
  <link rel="stylesheet" href="{{ asset('estilos/css/bootstrap.min.css') }}">

{{-- Materialize --}}
 {{-- <link rel="stylesheet" href="{{ asset('/materialize/css/materialize.min.css') }}"> --}}

 {{-- Icons Materialize --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

{!! MaterializeCSS::include_full() !!}

<link rel="stylesheet" href="{{ asset('/materialize-css/css/materialize.min.css') }}">
{{--  <link rel="stylesheet" href="{{ asset('materialize/fonts/materialize-icons/Materiallcons-Regular.eot') }}">
 <link rel="stylesheet" href="{{ asset('materialize/fonts/materialize-icons/Materiallcons-Regular.ttf') }}">
 <link rel="stylesheet" href="{{ asset('materialize/fonts/materialize-icons/Materiallcons-Regular.woff') }}">
 <link rel="stylesheet" href="{{ asset('materialize/fonts/materialize-icons/Materiallcons-Regular.woff2') }}">
 --}}
{{-- SweetAlert --}}
<link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}">
  
	<!-- Latest compiled and minified CSS -->
{{-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

	<!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
</head>
<body>
	<header>
    <div class="">
       <img class="logo hidden-md hidden-sm hidden-xs" src="{{ asset('estilos/img/logo.png') }}">
       <img class="logo visible-xs-* visible-sm-* visible-md-* hidden-lg" src="{{ asset('estilos/img/logo.png') }}" width="174" height="40">
    </div>    
  </header>

  @include('modulos.navbar')
	<div class="container">
		@yield('contenido')
	</div>

<footer class="footer-distributed">
  <div class="footer-left">
  <p>SIGESPI 2017</p>
    <p class="footer-links">
      <ul>
        <li><a href="https://portal.ucol.mx/fie/"><span class="glyphicon glyphicon-flag"></span> Facultad de Ingeniería Electromecánica</a></li>

        <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span> Dirección: Km 20, carretera Manzanillo-Cihuatlan Ejido El Naranjo Manzanillo, Colima</a></li>   

        <li><a href="#"><span class="glyphicon glyphicon-copyright-mark"></span> Derechos Reservados 2013-2016 Universidad de Colima</a></li> 

      </ul>
    </p>
    
  </div>
</footer>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

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

<script>
    $('.datepicker').pickadate({
      format: "yyyy-mm-dd",
      language: "es",
      selectMonths: true,
      autoclose: true
    /*selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year*/
  });
</script>

<script>
   $(document).ready(function() {
    $('select').material_select();
  });
</script>

</body>
</html>
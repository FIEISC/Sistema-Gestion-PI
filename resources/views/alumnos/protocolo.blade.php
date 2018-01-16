<div class="col-md-8 col-md-offset-2">

	<img style="width: 150px; height: 150px;" src="{{ url('images/fie.jpg') }}" alt="">
	<img style="width: 150px; height: 150px; margin-left: 400px;" src="{{ url('images/ucol.jpg') }}" alt="">

	<hr>
<h1 style="text-align: center;">{{ $protocolo->nom_protocolo }}</h1>

<h2 style="text-align: center;">{{ $protocolo->universidad }}</h2>
<h3 style="text-align: center;">{{ $protocolo->facultad }}</h3>
<h3 style="text-align: center;">{{ $protocolo->carrera }}</h3>
<hr>
<p style="text-align: justify;">{{ $protocolo->introduccion }}</p>
<p style="text-align: justify;">{{ $protocolo->antecedentes }}</p>
<p style="text-align: justify;">{{ $protocolo->objetivos }}</p>
<p style="text-align: justify;">{{ $protocolo->obj_particulares }}</p>
<p style="text-align: justify;">{{ $protocolo->justificacion }}</p>
<p style="text-align: justify;">{{ $protocolo->herramientas }}</p>
<p style="text-align: justify;">{{ $protocolo->entregables }}</p>
<p style="text-align: justify;">{{ $protocolo->entregables }}</p>
<p style="text-align: justify;">{{ $protocolo->preguntas_guia }}</p>
</div>


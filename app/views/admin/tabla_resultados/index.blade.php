@extends('layouts.scaffold')

@section('main')
<h1>Tabla de resultados del torneo: <span class="text-muted">{{ $encuentro->torneo->tipoTorneo->tipo_torneo }}</span></h1>

<div class="col-md-12 clearfix">
	<div class="col-md-5">
		@include('admin.tabla_resultados.layout.tabla_resultados', ['equipo' => $encuentro->eq1, 'encuentro' => $encuentro])
	</div>
	<div class="col-md-2">
		<h3 class="text-center">VS</h3>
		<h3 class="text-center">
			{{ $encuentro->golesEquipo($encuentro->eq1) }} - {{ $encuentro->golesEquipo($encuentro->eq2) }}
		</h3>
	</div>
	<div class="col-md-5">
		@include('admin.tabla_resultados.layout.tabla_resultados', ['equipo' => $encuentro->eq2, 'encuentro' => $encuentro])
	</div>
</div>

@stop

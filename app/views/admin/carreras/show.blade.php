@extends('layouts.scaffold')

@section('main')

<h1>Mostrar carrera</h1>

<p>{{ link_to_route('admin.carreras.index', 'Regresar a todas las carreras', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre de carrera</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $carrera->nombre_carrera }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.carreras.destroy', $carrera->nombre_carrera))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.carreras.edit', 'Editar', array($carrera->nombre_carrera), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

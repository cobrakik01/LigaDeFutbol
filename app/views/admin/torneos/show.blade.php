@extends('layouts.scaffold')

@section('main')

<h1>Mostrar torneo</h1>

<p>{{ link_to_route('admin.torneos.index', 'Regresar a todos los torneos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo de torneo</th>
			<th>Fecha de torneo</th>
			<th>Termino de torneo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $torneo->tipo_torneo }}}</td>
			<td>{{{ $torneo->fecha_torneo }}}</td>
			<td>{{{ $torneo->termino_torneo }}}</td>
            <td>
            	{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.torneos.destroy', $torneo->id))) }}
                {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('admin.torneos.edit', 'Editar', array($torneo->id), array('class' => 'btn btn-info')) }}
            </td>
		</tr>
	</tbody>
</table>

@stop

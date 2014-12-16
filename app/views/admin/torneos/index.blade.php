@extends('layouts.scaffold')

@section('main')

<h1>Todos los torneos</h1>

<p>{{ link_to_route('admin.torneos.create', 'Agregar nuevo torneo', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($torneos->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tipo de torneo</th>
				<th>Fecha de torneo</th>
				<th>Termino de torneo</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($torneos as $torneo)
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
			@endforeach
		</tbody>
	</table>
@else
	<div class="alert alert-info">
		<strong>Info.</strong> No se encontraron torneos.
	</div>
@endif

@stop

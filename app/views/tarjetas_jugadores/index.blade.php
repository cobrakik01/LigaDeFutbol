@extends('layouts.scaffold')

@section('main')

<h1>All Tarjetas_jugadores</h1>

<p>{{ link_to_route('tarjetas_jugadores.create', 'Add New Tarjetas_jugadore', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tarjetas_jugadores->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tipo_tarjeta</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tarjetas_jugadores as $tarjetas_jugadore)
				<tr>
					<td>{{{ $tarjetas_jugadore->tipo_tarjeta }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tarjetas_jugadores.destroy', $tarjetas_jugadore->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('tarjetas_jugadores.edit', 'Edit', array($tarjetas_jugadore->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tarjetas_jugadores
@endif

@stop

@extends('layouts.scaffold')

@section('main')

<h1>Show Tarjetas_jugadore</h1>

<p>{{ link_to_route('tarjetas_jugadores.index', 'Return to All tarjetas_jugadores', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo_tarjeta</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tarjetas_jugadore->tipo_tarjeta }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tarjetas_jugadores.destroy', $tarjetas_jugadore->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('tarjetas_jugadores.edit', 'Edit', array($tarjetas_jugadore->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

@extends('layouts.scaffold')

@section('main')

<h1>Show Posicione</h1>

<p>{{ link_to_route('admin.posiciones.index', 'Return to All posiciones', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre_posicion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $posicione->nombre_posicion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.posiciones.destroy', $posicione->nombre_posicion))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.posiciones.edit', 'Edit', array($posicione->nombre_posicion), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

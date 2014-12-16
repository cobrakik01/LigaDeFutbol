@extends('layouts.scaffold')

@section('main')

<h1>Mostrar posicion</h1>

<p>{{ link_to_route('admin.posiciones.index', 'Regresar a todas las posiciones', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Posicion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $posicione->nombre_posicion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.posiciones.destroy', $posicione->nombre_posicion))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.posiciones.edit', 'Editar', array($posicione->nombre_posicion), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

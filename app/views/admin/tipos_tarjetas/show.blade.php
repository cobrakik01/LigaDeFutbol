@extends('layouts.scaffold')

@section('main')

<h1>Mostrar tipos de tarjeta</h1>

<p>{{ link_to_route('admin.tipos_tarjetas.index', 'Regresar a todos los tipos de tarjeta', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo de tarjeta</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tipos_tarjeta->tipo_tarjeta }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.tipos_tarjetas.destroy', $tipos_tarjeta->tipo_tarjeta))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.tipos_tarjetas.edit', 'Editar', array($tipos_tarjeta->tipo_tarjeta), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

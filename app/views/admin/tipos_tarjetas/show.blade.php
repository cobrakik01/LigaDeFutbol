@extends('layouts.scaffold')

@section('main')

<h1>Show Tipos_tarjeta</h1>

<p>{{ link_to_route('admin.tipos_tarjetas.index', 'Return to All tipos_tarjetas', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo_tarjeta</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tipos_tarjeta->tipo_tarjeta }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.tipos_tarjetas.destroy', $tipos_tarjeta->tipo_tarjeta))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.tipos_tarjetas.edit', 'Edit', array($tipos_tarjeta->tipo_tarjeta), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

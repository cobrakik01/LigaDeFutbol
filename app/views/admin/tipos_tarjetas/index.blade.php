@extends('layouts.scaffold')

@section('main')

<h1>Todos los tipos de tarjetas</h1>

<p>{{ link_to_route('admin.tipos_tarjetas.create', 'Agregar nuevo tipo de tarjeta', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tipos_tarjetas->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tipo de tarjeta</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tipos_tarjetas as $tipos_tarjeta)
				<tr>
					<td>{{{ $tipos_tarjeta->tipo_tarjeta }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.tipos_tarjetas.destroy', $tipos_tarjeta->tipo_tarjeta))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.tipos_tarjetas.edit', 'Editar', array($tipos_tarjeta->tipo_tarjeta), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tipos_tarjetas
@endif

@stop

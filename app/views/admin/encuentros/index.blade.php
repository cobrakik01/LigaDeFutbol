@extends('layouts.scaffold')

@section('main')

<h1>Todos los Encuentros</h1>

<p>{{ link_to_route('admin.encuentros.create', 'Agregar nuevo encuentro', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($encuentros->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Torneo</th>
				<th>Equipo 1</th>
				<th>Equipo 2</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($encuentros as $encuentro)
				<tr>
				<td>{{{ $encuentro->torneo['tipo_torneo'] }}}</td>
				<td>{{{ $encuentro->equipo1 }}}</td>
				<td>{{{ $encuentro->equipo2 }}}</td>
                <td>
                    {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.encuentros.destroy', $encuentro->id))) }}
                        {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                    {{ link_to_route('admin.encuentros.edit', 'Editar', array($encuentro->id), array('class' => 'btn btn-info')) }}
                    {{ link_to_route('admin.tr.index', 'Tabla de resultados', [$encuentro->id], array('class' => 'btn btn-info')) }}
                </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<div class="alert alert-info">
		<strong>Info.</strong> No se encontraron resultados.
	</div>
@endif

@stop

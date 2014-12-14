@extends('layouts.scaffold')

@section('main')

<h1>All Equipos</h1>

<p>{{ link_to_route('admin.equipos.create', 'Add New Equipo', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($equipos->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Logo</th>
				<th>Visitante</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($equipos as $equipo)
				<tr>
					<td>{{{ $equipo->nombre }}}</td>
					<td>{{{ $equipo->logo }}}</td>
					<td>{{{ $equipo->visitante }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.equipos.destroy', $equipo->nombre))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.equipos.edit', 'Edit', array($equipo->nombre), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no equipos
@endif

@stop

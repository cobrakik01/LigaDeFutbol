@extends('layouts.scaffold')

@section('main')

<h1>Show Equipo</h1>

<p>{{ link_to_route('admin.equipos.index', 'Return to All equipos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
				<th>Logo</th>
				<th>Visitante</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop

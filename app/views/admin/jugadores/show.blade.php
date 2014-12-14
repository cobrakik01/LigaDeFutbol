@extends('layouts.scaffold')

@section('main')

<h1>Show Jugadore</h1>

<p>{{ link_to_route('admin.jugadores.index', 'Return to All jugadores', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre_posicion</th>
				<th>Equipo</th>
				<th>Carrera</th>
				<th>Semestre</th>
				<th>Fotografia</th>
				<th>Nombre</th>
				<th>App</th>
				<th>Apm</th>
				<th>Fecha_nacimiento</th>
				<th>Dorsal</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $jugadore->nombre_posicion }}}</td>
					<td>{{{ $jugadore->equipo }}}</td>
					<td>{{{ $jugadore->carrera }}}</td>
					<td>{{{ $jugadore->semestre }}}</td>
					<td>{{{ $jugadore->fotografia }}}</td>
					<td>{{{ $jugadore->nombre }}}</td>
					<td>{{{ $jugadore->app }}}</td>
					<td>{{{ $jugadore->apm }}}</td>
					<td>{{{ $jugadore->fecha_nacimiento }}}</td>
					<td>{{{ $jugadore->dorsal }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.jugadores.destroy', $jugadore->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.jugadores.edit', 'Edit', array($jugadore->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

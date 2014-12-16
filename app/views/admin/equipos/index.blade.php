@extends('layouts.scaffold')

@section('main')

<h1>Todos los Equipos</h1>

<p>{{ link_to_route('admin.equipos.create', 'Agregar nuevo equipo', null, array('class' => 'btn btn-lg btn-success')) }}</p>

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
					<td>
						@if($equipo->visitante)
							Si
						@else
							No
						@endif
					</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.equipos.destroy', $equipo->nombre))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.equipos.edit', 'Editar', array($equipo->nombre), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no equipos
@endif

@stop

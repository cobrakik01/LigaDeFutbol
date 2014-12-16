@extends('layouts.scaffold')

@section('main')

<h1>Mostrar usuario</h1>

<p>{{ link_to_route('admin.usuarios.index', 'Regresar a todos los usuarios', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
				<th>Password</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $usuario->nombre }}}</td>
			<td>
				{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.usuarios.destroy', $usuario->id))) }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('admin.usuarios.edit', 'Editar', array($usuario->id), array('class' => 'btn btn-info')) }}
            </td>
		</tr>
	</tbody>
</table>

@stop

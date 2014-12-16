@extends('layouts.scaffold')

@section('main')

<h1>Todos los usuarios</h1>

<p>{{ link_to_route('admin.usuarios.create', 'Agregar nuevo usuario', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($usuarios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($usuarios as $usuario)
				<tr>
					<td>{{{ $usuario->nombre }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.usuarios.destroy', $usuario->nombre))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.usuarios.edit', 'Editar', array($usuario->nombre), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no usuarios
@endif

@stop

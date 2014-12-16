@extends('layouts.scaffold')

@section('main')

<h1>Mostrar encuentro</h1>

<p>{{ link_to_route('admin.encuentros.index', 'Regresar a todos los encuentros', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Torneo</th>
			<th>Equipo 1</th>
			<th>Equipo 2</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $encuentro->torneo['tipo_torneo'] }}}</td>
			<td>{{{ $encuentro->equipo1 }}}</td>
			<td>{{{ $encuentro->equipo2 }}}</td>
            <td>
                {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.encuentros.destroy', $encuentro->id))) }}
            	    {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('admin.encuentros.edit', 'Editar', array($encuentro->id), array('class' => 'btn btn-info')) }}
            </td>
		</tr>
	</tbody>
</table>

@stop

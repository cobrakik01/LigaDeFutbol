@extends('layouts.scaffold')

@section('main')

<h1>Mostrar tipo de torneo</h1>

<p>{{ link_to_route('admin.tipos_torneos.index', 'Regresar a todos los tipos de torneos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo de torneo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tipos_torneo->tipo_torneo }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.tipos_torneos.destroy', $tipos_torneo->tipo_torneo))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.tipos_torneos.edit', 'Editar', array($tipos_torneo->tipo_torneo), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

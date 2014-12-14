@extends('layouts.scaffold')

@section('main')

<h1>Show Tipos_torneo</h1>

<p>{{ link_to_route('admin.tipos_torneos.index', 'Return to All tipos_torneos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo_torneo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tipos_torneo->tipo_torneo }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.tipos_torneos.destroy', $tipos_torneo->tipo_torneo))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.tipos_torneos.edit', 'Edit', array($tipos_torneo->tipo_torneo), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

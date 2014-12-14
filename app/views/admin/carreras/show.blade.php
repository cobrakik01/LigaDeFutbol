@extends('layouts.scaffold')

@section('main')

<h1>Show Carrera</h1>

<p>{{ link_to_route('admin.carreras.index', 'Return to All carreras', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre_carrera</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $carrera->nombre_carrera }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.carreras.destroy', $carrera->nombre_carrera))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.carreras.edit', 'Edit', array($carrera->nombre_carrera), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

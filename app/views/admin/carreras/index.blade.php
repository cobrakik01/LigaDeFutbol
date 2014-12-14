@extends('layouts.scaffold')

@section('main')

<h1>All Carreras</h1>

<p>{{ link_to_route('admin.carreras.create', 'Add New Carrera', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($carreras->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre_carrera</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($carreras as $carrera)
				<tr>
					<td>{{{ $carrera->nombre_carrera }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.carreras.destroy', $carrera->nombre_carrera))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.carreras.edit', 'Edit', array($carrera->nombre_carrera), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no carreras
@endif

@stop

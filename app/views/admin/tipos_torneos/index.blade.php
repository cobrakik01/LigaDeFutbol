@extends('layouts.scaffold')

@section('main')

<h1>All Tipos_torneos</h1>

<p>{{ link_to_route('admin.tipos_torneos.create', 'Add New Tipos_torneo', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tipos_torneos->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tipo_torneo</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tipos_torneos as $tipos_torneo)
				<tr>
					<td>{{{ $tipos_torneo->tipo_torneo }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.tipos_torneos.destroy', $tipos_torneo->tipo_torneo))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.tipos_torneos.edit', 'Edit', array($tipos_torneo->tipo_torneo), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tipos_torneos
@endif

@stop

@extends('layouts.scaffold')

@section('main')

<h1>All Semestres</h1>

<p>{{ link_to_route('admin.semestres.create', 'Add New Semestre', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($semestres->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Semestre</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($semestres as $semestre)
				<tr>
					<td>{{{ $semestre->semestre }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.semestres.destroy', $semestre->semestre))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.semestres.edit', 'Edit', array($semestre->semestre), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no semestres
@endif

@stop

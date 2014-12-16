@extends('layouts.scaffold')

@section('main')

<h1>Todos los semestres</h1>

<p>{{ link_to_route('admin.semestres.create', 'Agregar nuevo semestre', null, array('class' => 'btn btn-lg btn-success')) }}</p>

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
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.semestres.edit', 'Editar', array($semestre->semestre), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no semestres
@endif

@stop

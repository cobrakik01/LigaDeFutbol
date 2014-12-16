@extends('layouts.scaffold')

@section('main')

<h1>Mostrar semestre</h1>

<p>{{ link_to_route('admin.semestres.index', 'Regresar a todos los semestres', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Semestre</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $semestre->semestre }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.semestres.destroy', $semestre->semestre))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.semestres.edit', 'Editar', array($semestre->semestre), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop

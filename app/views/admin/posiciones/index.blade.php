@extends('layouts.scaffold')

@section('main')

<h1>All Posiciones</h1>

<p>{{ link_to_route('admin.posiciones.create', 'Add New Posicione', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($posiciones->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre_posicion</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($posiciones as $posicione)
				<tr>
					<td>{{{ $posicione->nombre_posicion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.posiciones.destroy', $posicione->nombre_posicion))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.posiciones.edit', 'Edit', array($posicione->nombre_posicion), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no posiciones
@endif

@stop

@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Editar carrera</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($carrera, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.carreras.update', $carrera->nombre_carrera))) }}

        <div class="form-group">
            {{ Form::label('nombre_carrera', 'Nombre de carrera:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nombre_carrera', Input::old('nombre_carrera'), array('class'=>'form-control', 'placeholder'=>'Nombre de carrera')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Actualizar', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('admin.carreras.show', 'Cancelar', $carrera->nombre_carrera, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop
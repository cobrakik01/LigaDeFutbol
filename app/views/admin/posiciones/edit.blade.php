@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Posicione</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($posicione, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.posiciones.update', $posicione->nombre_posicion))) }}

        <div class="form-group">
            {{ Form::label('nombre_posicion', 'Nombre_posicion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nombre_posicion', Input::old('nombre_posicion'), array('class'=>'form-control', 'placeholder'=>'Nombre_posicion')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('admin.posiciones.show', 'Cancel', $posicione->nombre_posicion, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop
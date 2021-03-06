@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Editar tipo de torneo</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($tipos_torneo, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.tipos_torneos.update', $tipos_torneo->tipo_torneo))) }}

        <div class="form-group">
            {{ Form::label('tipo_torneo', 'Tipo de torneo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('tipo_torneo', Input::old('tipo_torneo'), array('class'=>'form-control', 'placeholder'=>'Tipo de torneo')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Actualizar', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('admin.tipos_torneos.show', 'Cancelar', $tipos_torneo->tipo_torneo, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop
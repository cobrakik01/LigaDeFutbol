@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Tipos_tarjeta</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($tipos_tarjeta, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.tipos_tarjetas.update', $tipos_tarjeta->tipo_tarjeta))) }}

        <div class="form-group">
            {{ Form::label('tipo_tarjeta', 'Tipo_tarjeta:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('tipo_tarjeta', Input::old('tipo_tarjeta'), array('class'=>'form-control', 'placeholder'=>'Tipo_tarjeta')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('admin.tipos_tarjetas.show', 'Cancel', $tipos_tarjeta->tipo_tarjeta, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop
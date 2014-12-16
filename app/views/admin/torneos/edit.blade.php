@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Editar torneo</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($torneo, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('admin.torneos.update', $torneo->id))) }}

        <div class="form-group">
            {{ Form::label('tipo_torneo', 'Tipo de torneo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="tipo_torneo" id="tipo_torneo" class="form-control">
                @foreach($torneos as $t)
                <option value="{{ $t->tipo_torneo }}" {{ (($t->tipo_torneo == $torneo->tipo_torneo) ? 'selected' : '') }}>{{ $t->tipo_torneo }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('fecha_torneo', 'Fecha de torneo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('date', 'fecha_torneo', Input::old('fecha_torneo'), array('class'=>'form-control', 'placeholder'=>'Fecha de torneo')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('termino_torneo', 'Termino de torneo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('date', 'termino_torneo', Input::old('termino_torneo'), array('class'=>'form-control', 'placeholder'=>'Termino de torneo')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Actualizar', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('admin.torneos.show', 'Cancelar', $torneo->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop
@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Crear Encuentro</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'admin.encuentros.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('torneo_id', 'Torneo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="torneo_id" id="torneo_id" class="form-control">
                @foreach($torneos as $t)
                <option value="{{ $t->id }}">{{ $t->tipo_torneo }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('equipo1', 'Equipo 1:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="equipo1" id="equipo1" class="form-control">
                @foreach($equipos as $e)
                <option value="{{ $e->nombre }}">{{ $e->nombre }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('equipo2', 'Equipo 2:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="equipo2" id="equipo2" class="form-control">
                @foreach($equipos as $e)
                <option value="{{ $e->nombre }}">{{ $e->nombre }}</option>
                @endforeach
              </select>
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Crear', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop



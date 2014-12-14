@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Nuevo Jugador</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'admin.jugadores.store', 'class' => 'form-horizontal', 'files' => true)) }}

        <div class="form-group">
            {{ Form::label('nombre_posicion', 'Posicion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="nombre_posicion" id="nombre_posicion" class="form-control">
                @foreach($posiciones as $posicion)
                <option value="{{ $posicion->nombre_posicion }}">{{ $posicion->nombre_posicion }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('equipo', 'Equipo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="equipo" id="equipo" class="form-control">
                @foreach($equipos as $equipo)
                <option value="{{ $equipo->nombre }}">{{ $equipo->nombre }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('carrera', 'Carrera:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="carrera" id="carrera" class="form-control">
                @foreach($carreras as $carrera)
                <option value="{{ $carrera->nombre_carrera }}">{{ $carrera->nombre_carrera }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('semestre', 'Semestre:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              <select name="semestre" id="semestre" class="form-control">
                @foreach($semestres as $semestre)
                <option value="{{ $semestre->semestre }}">{{ $semestre->semestre }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('fotografia', 'Fotografía:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::file('fotografia', Input::old('fotografia'), array('class'=>'form-control', 'placeholder'=>'Fotografia')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('app', 'Apellido Paterno:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('app', Input::old('app'), array('class'=>'form-control', 'placeholder'=>'Apellido Paterno')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('apm', 'Apellido Materno:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('apm', Input::old('apm'), array('class'=>'form-control', 'placeholder'=>'Apellido Materno')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('fecha_nacimiento', 'Fecha de nacimiento:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('date', 'fecha_nacimiento', Input::old('fecha_nacimiento'), array('class'=>'form-control', 'placeholder'=>'Fecha de nacimiento')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dorsal', 'Dorsal:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'dorsal', Input::old('dorsal'), array('class'=>'form-control')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	{{ HTML::style('css/bootstrap.min.css') }}
</head>
<body>
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			{{ Form::open(['route' => 'admin.login', 'method' => 'post']) }}
				<div class="panel panel-default">
					<div class="panel-body">
						<label style="display: block;">
							Usuario:
							{{ Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'required' => true]) }}
						</label>
						<label style="display: block;">
							Password:
							{{ Form::password('password', ['class' => 'form-control', 'required' => true]) }}
						</label>
						{{ Form::submit('Entrar', ['class' => 'btn btn-primary']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
		@if(Session::has('message'))
		<div class="col-md-4 col-md-offset-4">
			<div class="alert alert-warning">
				<strong>Cuidado!</strong> {{{ Session::get('message')['msg'] }}}
			</div>
		</div>
		@endif
	</div>

	{{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>
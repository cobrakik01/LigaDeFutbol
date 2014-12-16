<h3 class="text-center">
	{{ $equipo->nombre }}
	@if($equipo->visitante)
	<small>Visitante</small>
	@else
	<small>Local</small>
	@endif
</h3>
<div class="row">
	<div class="col-md-12 panel panel-default panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>Jugador</th>
					<th>Tarjetas</th>
					<th>Goles</th>
				</tr>
			</thead>
			<tbody>
				@if($equipo->jugadores->count() > 0)
					@foreach($equipo->jugadores as $jugador)
						<tr>
							<td>{{ $jugador->nombre }}</td>
							<td>
								@if(count($encuentro->tarjetasJugador($jugador)) > 0)
									@foreach($encuentro->tarjetasJugador($jugador) as $tarjeta)
										{{ $tarjeta->tipo_tarjeta }}
									@endforeach
								@else
									Sin tarjetas
								@endif
							</td>
							<td>
								{{ $encuentro->golesJugador($jugador) }}
								{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'post', 'route' => ['admin.tr.quitar.gol', $encuentro->id, $jugador->id])) }}
									<button type="submit" class="btn btn-danger btn-xs">
										-
									</button>
								{{ Form::close() }}
								{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'post', 'route' => ['admin.tr.agregar.gol', $encuentro->id, $jugador->id])) }}
									<button type="submit" class="btn btn-primary btn-xs">
										+
									</button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>	
</div>
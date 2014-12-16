<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        {{ HTML::style('css/bootstrap.min.css') }}
        <style>
            body { padding-top: 20px; }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <ul class="nav nav-pills">
                        <li>
                            <a href="{{ action('admin') }}">Inicio</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.posiciones.index') }}">Posiciones</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.carreras.index') }}">Carreras</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.semestres.index') }}">Semestres</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.tipos_torneos.index') }}">Tipo de torneos</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.tipos_tarjetas.index') }}">Tipo de tarjetas</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.jugadores.index') }}">Jugadores</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.equipos.index') }}">Equipos</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.torneos.index') }}">Torneos</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.encuentros.index') }}">Encuentros</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.usuarios.index') }}">Usuarios</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/tabla-resultados') }}">Tabla de resultados</a>
                        </li>
                        <li>
                            <a href="{{ action('admin.logout') }}">Salir</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    @if (Session::has('message'))
                        <div class="flash alert">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif

                    @yield('main')
                </div>
            </div>
        </div>
        {{ HTML::script('js/jquery.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
    </body>
</html>
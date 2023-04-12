<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title> @yield('title') Eventos App</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Eventos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('home', ['category' => $category->id]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex me-3">
                <input class="form-control me-2"
                       type="search"
                       placeholder="Buscar evento"
                       aria-label="Search"
                       value="{{ request()->query('search') }}"
                       name="search">
                <button class="btn btn-dark" type="submit" style="border-color: #3d3d3d">Buscar</button>
            </form>
            <div class="d-flex me-2">
                @auth
                    <a class="nav-link link-light" href="{{ route('admin.events.index') }}">Meu Painel</a>
                @else
                    <a class="nav-link link-light" href="{{ route('login') }}">Acessar Admin</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('messages.bootstrap.messages')
            </div>
        </div>
        @yield('content')
    </div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

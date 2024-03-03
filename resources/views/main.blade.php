<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar bg-body-tertiary shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h1">License Plate Recognition</span>
        <div class="btn-group">
            <button class="btn btn-sm btn-link link-dark link-underline link-underline-opacity-0 dropdown-toggle"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                User Name
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">User Name</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="container mt-4 mb-4">
    @yield('content')
</main>
<footer class="container-fluid shadow ">
    <div class="container">
        <div class="p-4">
            <p class="text-center fs-3 text-light">License Plate Recognition</p>
            <p class="text-center fs-6 text-light">Copyright &copy;2024 All rights reserved</p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{url('js/script.js')}}"></script>
</body>
</html>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>@yield('title')</title>
    <style>

    </style>
</head>
<body>
<nav class="navbar bg-body-tertiary shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Navbar</span>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
    const plateInput = document.getElementById('search_plate');
    const vehicleInput = document.getElementById('search_vehicle');

    plateInput.addEventListener('input', function () {
        vehicleInput.disabled = !!this.value;
    });
    vehicleInput.addEventListener('input', function () {
        plateInput.disabled = !!this.value;
    });


    $(document).ready(function () {
        $(".edit-btn").click(function () {
            const row = $(this).closest("tr");
            row.find(".editable").each(function () {
                const input = $(this).next();
                $(this).toggle();
                input.toggle();
                if (input.is(":visible")) {
                    input.focus();
                }
            });
            $(this).text(function (i, text) {
                return text === "Editar" ? "Salvar" : "Editar";
            });
            row.find(".edit-btn").toggle();
            row.find(".save-btn").toggle();
        });
    });

    $(".clear-btn").click(function () {
        var input = $(this).prev("input[type='text']");
        input.val(''); // Limpa o input associado ao botão
    });
</script>
</body>
</html>

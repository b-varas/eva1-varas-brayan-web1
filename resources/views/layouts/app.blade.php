<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Proyectos - Tech Solutions</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <x-uf-widget />

    @if (session('success'))
        <div class="popup popup-success" id="popup-mensaje">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="popup popup-error" id="popup-mensaje">
            {{ session('error') }}
        </div>
    @endif

    @yield('contenido')

    <script>
        const popup = document.getElementById('popup-mensaje');

        if (popup) {
            setTimeout(function () {
                popup.remove();
            }, 3000);
        }
    </script>

</body>
</html>
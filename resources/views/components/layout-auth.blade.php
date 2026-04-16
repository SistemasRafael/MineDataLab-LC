<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 <body class="min-h-screen flex items-center justify-center bg-gray-100">
    {{ $slot }}
</body>
</html>
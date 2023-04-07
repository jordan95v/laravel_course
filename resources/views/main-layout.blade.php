<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <script src="https://kit.fontawesome.com/51d79ea4d7.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Navbar --}}
    <x-navbar />

    {{-- Alerts --}}
    <x-alerts />

    {{-- Main content --}}
    @yield('content')
</body>

</html>

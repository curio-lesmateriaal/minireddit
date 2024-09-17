<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Minireddit</title>
</head>
<body>
    {{-- @include('components.nav-menu') --}}
    <x-nav-menu />
    <div class="p-16">
        @yield('content')
    </div>

    <footer>This is the footer...</footer>
</body>
</html>

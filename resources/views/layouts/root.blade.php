<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('root.meta')

    <title>@yield('root.title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('root.css')
</head>

<body>
    @yield('root.content')
</body>

</html>

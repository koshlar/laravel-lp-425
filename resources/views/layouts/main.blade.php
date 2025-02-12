<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <title>{{ $title ?? env('APP_NAME') }}</title>
</head>

<body>
    @include('components.Header')
    @yield('content')
</body>

</html>

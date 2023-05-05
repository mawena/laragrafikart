<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="/css/bootstrap-cosmo.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <style>
        @layer demo {
            button {
                all: unset;
            }
        }
    </style>
</head>

@php
    $routeName = request()
        ->route()
        ->getName();
@endphp

<body>
    @include('parts.nav')

    <div class="container">
        @if (session('success'))
            <div class="message-box">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @yield('content')
    </div>

    {{-- @include('parts.footer') --}}
</body>

</html>

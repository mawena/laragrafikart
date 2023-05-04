<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="/css/bootstrap-sketchy.min.css">
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
    @include('Parts.nav')

    <div class="container">
        @yield('content')
    </div>
</body>

</html>

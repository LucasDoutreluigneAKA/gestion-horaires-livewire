<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        @livewireStyles()

        <link rel="stylesheet" href="/css/reset.css">

        @section('head')
        @show


        <title>

            @section('title')
                Sans titre
            @show

        </title>
    </head>

    <body>
        @livewireScripts()
        @yield('content')
    </body>
</html>

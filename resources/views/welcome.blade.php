<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>


        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/all.css') }}" rel="stylesheet">


    </head>
    <body>


    <script src="{{ mix('js/all.js') }}"></script>
    </body>



</html>

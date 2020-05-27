<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'BizListr') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app" class="container my-5">
            <h2>{{ config('app.name', 'BizListr') }}</h2>
            <hr>

            <Listings />
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

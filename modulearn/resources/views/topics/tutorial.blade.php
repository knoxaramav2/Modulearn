<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - {{$content->title}}</title>
    </head>
    <body>
        @include('partial/header')

        <div>
            @markdown($content->content)
        </div>

        <div class="content">
        </div>
    </body>

</html>
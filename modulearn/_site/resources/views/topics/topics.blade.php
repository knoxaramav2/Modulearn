<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Topics</title>
    </head>
    <body>
        @include('partial/header')

        <div class="content">
            <nav class='horiz-nav-bar'>
                <div class='hover-react-color'><a href='/topics/create'>Create A Topic!</a></div>
            </nav>

            <div>
                @foreach($entries as $entry)
                <div class='slot-entry'>
                    <a href='/topics/{{$entry->id}}'><span>{{$entry->title}}</span></a>
                </div>
                @endforeach
            </div>
        </div>
    </body>

</html>
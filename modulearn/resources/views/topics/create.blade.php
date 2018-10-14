<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

        <link href="{{asset('css/tutorial.css')}}" rel="stylesheet">

        <title>Modulearn - Create Tutoriallette</title>
    </head>
    <body onload='ready();'>
        @include('partial/header')
        <div id='tutorial-editor'>
            <div>
                <div>
                    <input type='text' placeholder="Enter a title"/>
                </div>
                <div>
                    <textarea id='md-editor'></textarea>
                </div>
            </div>
            <div>

            </div>
        </div>
        
    </body>
    <script>
    
    function ready(){
        var simplemde = new SimpleMDE({
            element:document.getElementById("md-editor"),
            indentWithTabs: false,
            spellChecker: true,
            tabSize: 4,
            autofocus: true
            });
    }

    </script>

</html>
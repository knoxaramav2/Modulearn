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
            <div id='tutorial-editor-main'>
                <form action='/api/content' method='post'>
                    {{ csrf_field() }}
                    <input type='hidden' id='input-markdown' name='input-markdown'>
                    <div>
                        <input type='text' placeholder="Enter a title" name='title'/>
                    </div>
                    <div>
                        <textarea id='md-editor'></textarea>
                    </div>
                    <input type='submit' onclick='prepareSubmitData();'>
                </form>
            </div>
            <div id='tutorial-editor-toolbar'>
                <div class='tutorial-editor-tool'>
                    <div id='dependency-container'>
                        <div>
                            <h3>Add pre-requisites</h3>
                        </div>
                        <div id='add-dep-btn'>
                            <button>
                                Add a dependency
                                <img src='/icons/add-content.ico'>
                            </button>
                        </div>
                        <div id='dependency-list'>
                            <div class='dependency-item'>
                                <span>Dependency</span>
                                <button>-</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='tutorial-editor-tool'>Tool</div>
                <div class='tutorial-editor-tool'>Tool</div>
                <div class='tutorial-editor-tool'>Tool</div>
                <div class='tutorial-editor-tool'>Tool</div>
                <div class='tutorial-editor-tool'>Tool</div>
            </div>
        </div>
        <!--
        <div id='tutorial-entry-control'>
            <form action='/api/content' method='post'>
                <input type='submit' value='Submit' onclick="prepareSubmitData();">
                <input type='text' id='markdown' name='markdown' hidden>
                <input type='text' id='title' name='title' hidden>
            </form>
            
        </div>-->
        
    </body>
    <script>

        var simplemde;

        function prepareSubmitData(){
            let md = document.getElementById("input-markdown");
            md.value = simplemde.value();
        }
    
        function ready(){
            simplemde = new SimpleMDE({
                element:document.getElementById("md-editor"),
                indentWithTabs: false,
                spellChecker: true,
                tabSize: 4,
                autofocus: true
                });
        }

    </script>

</html>
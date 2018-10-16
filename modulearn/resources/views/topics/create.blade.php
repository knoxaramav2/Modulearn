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
                            <div>
                                <button onclick="addDependency();">
                                    Add a dependency
                                    <img src='/icons/add-content.ico'>
                                </button>
                            </div>
                            <div class='tooltip-parent'>
                                <input type='number' id='dependency-id'
                                    placeholder="Enter dependency id">
                                    <span class='tooltip'>Id can be found on the tutorial page</span>
                            </div>
                        </div>
                        <div id='dependency-list'>
                            <!--<div class='dependency-item'>
                                <span>Dependency</span>
                                <button>-</button>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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

        function addDependency(){
            let idDiv = document.getElementById('dependency-id');
            let id = idDiv.value;
            if (id.length === 0){
                console.log("EMPTY");
                return;
            }
            
            let depList = document.getElementById('dependency-list');
            let div = document.createElement('div');
            let span = document.createTextNode(id);
            let button = document.createElement('button');
            let min = document.createTextNode('-');
            button.onclick=(function(){div.remove()});
            button.appendChild(min);
            div.classList.add('dependency-item');
            div.appendChild(span);
            div.appendChild(button);
            depList.appendChild(div);

            idDiv.value='';
        }

    </script>

</html>
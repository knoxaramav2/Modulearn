<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

        <link href="<?php echo e(asset('css/tutorial.css')); ?>" rel="stylesheet">

        <title>Modulearn - Create Tutoriallette</title>
    </head>
    <body onload='ready();'>
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partial/md-editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!--
        <div id='tutorial-editor'>
            <div id='tutorial-editor-main'>
                <form action='/topics' id='tutorial-form' method='post'>
                    <?php echo e(csrf_field()); ?>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        
    </body>
    <script>

        var simplemde;

        document.getElementById('tutorial-form').onkeypress = function(e){
            let kp = e.charCode || e.keyCode;
            if (kp == 13) {e.preventDefault();} 
        }

        function prepareSubmitData(){
            let md = document.getElementById("input-markdown");
            md.value = simplemde.value();

            let deps = document.getElementsByClassName('dependency-item');
            let form = document.getElementById('tutorial-form');

            console.log(deps);

            for(let itr = 0; itr < deps.length; ++itr){
                let input = document.createElement('input');
                input.type='text';
                input.name = 'dep-' + itr;
                input.hidden = true;
                input.value=deps[itr].firstChild.innerText;
                form.appendChild(input);
            };
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
                return;
            }
            
            let depList = document.getElementById('dependency-list');
            let div = document.createElement('div');
            let text = document.createTextNode(id);
            let span = document.createElement('span');
            let button = document.createElement('button');
            let min = document.createTextNode('-');
            
            button.onclick=(function(){div.remove()});
            button.appendChild(min);
            span.appendChild(text);
            div.classList.add('dependency-item');
            div.appendChild(span);
            div.appendChild(button);
            depList.appendChild(div);

            idDiv.value='';
        }

    </script>

</html>
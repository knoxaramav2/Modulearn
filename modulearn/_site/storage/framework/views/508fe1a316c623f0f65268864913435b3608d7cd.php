<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <link href="<?php echo e(asset('css/tutorial.css')); ?>" rel="stylesheet">
    </head>
    <body onload='ready();loadHidden();'>
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partial/md-editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>

    <script>

    function loadHidden(){
        smde = getMdEditor();

        Http = new XMLHttpRequest();
        Http.open("GET", "/api/topics/get_tutorial/"+"<?php echo e($content->id); ?>/true");
        Http.send();

        let depQueue = [];

        let title = document.getElementsByName('title')[0];

        Http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                let depObj = JSON.parse(Http.responseText);
                title.value = depObj.title;
                smde.value(depObj.content);
                console.log(depObj);

                for(let d of depObj.dependencies){
                    addDependency(d.id);
                }
            }                
        }
    }
    </script>
</html>
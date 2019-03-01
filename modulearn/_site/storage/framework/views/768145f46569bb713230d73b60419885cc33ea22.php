<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ERROR</title>
    </head>
    <body>
    
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="content">
            <h1>Hmmm....</h1>
            <h3><?php echo e($msg); ?></h3>
        </div>

    </body>
</html>
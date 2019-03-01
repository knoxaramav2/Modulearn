<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn - Topics</title>
    </head>
    <body>
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="content">
            <nav class='horiz-nav-bar'>
                <div class='hover-react-color'><a href='/topics/create'>Create A Topic!</a></div>
            </nav>

            <div>
                <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class='slot-entry'>
                    <a href='/topics/<?php echo e($entry->id); ?>'><span><?php echo e($entry->title); ?></span></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </body>

</html>
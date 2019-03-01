<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account</title>
    </head>
    <body>
    
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="content">
            <div class="container-side-by-side">
                <div class="container-left">
                    <div id="profile-header">
                        <img src="<?php echo e(asset('images/a.jpg')); ?>" alt="Placeholder" height="256" width="256">
                        <a href="">Edit</a>
                    </div>
                    <div>
                        <?php $__currentLoopData = $submitted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <a href='/topics/<?php echo e($item->id); ?>/edit'>
                                <div><?php echo e($item->title); ?></div>
                            </a>
                            <button>Edit</button>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class='container-right'>
                    <h2>Submissions</h2>
                    
                </div>
            </div>
            <div>

            </div>
        </div>
    </body>
</html>
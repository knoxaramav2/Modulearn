<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn</title>
    </head>
    <body>
    
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <header class='home-header'>
            <nav>
                <div class='hover-react-color'><a href='/'><h1>Start Here</h1></a></div>
                <div class='hover-react-color'><a href='/'><h1>Explore Content</h1></a></div>
                <div class='hover-react-color'><a href='/about'><h1>About Modulearn</h1></a></div>
            </nav>
        </header>
        <div class='content'>
            <div class='content-item'>
                <div>
                    <h2>Recent Tutorials</h2>
                </div>
                <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href='/topics/<?php echo e($item->id); ?>' class='home-content-link'>
                        <div><?php echo e($item->title); ?></div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class='content-item'>
                <div>
                    <h2>Trending Tutorials</h2>
                </div>
            </div>
            <div class='content-item'>
                <div>
                    <h2>Trending Blog Posts</h2>
                </div>
            </div>
        </div>

    </body>
</html>

<script>
    
    function redirect(url){
        window.location = url;
    }
</script>
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
            <div class="left_container">
                <div class="upper_container">
                    <div id="profile_header">
                        <img src="<?php echo e(asset('images/a.jpg')); ?>" alt="Placeholder" height="256" width="256">
                        <a href="">Edit</a>
                    </div>
                </div>
                <div class="lower_container">
                    <div id="favorites_panel">
                        <h3>Favorites</h3>
                        <?php for($x=0; $x<=10; ++$x): ?>
                            <div class="fav_item"></div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="right_container">
                <div class="upper_container">
                    <h2>Submitted</h2>
                    <?php for($x=0; $x<=3; ++$x): ?>
                        <div class="submitted_item"></div>
                    <?php endfor; ?>
                </div>
                <div class="lower_container">
                    <h2>Blog Posts</h2>
                    <?php for($x=0; $x<=3; ++$x): ?>
                        <div class="blog_item"></div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </body>
</html>
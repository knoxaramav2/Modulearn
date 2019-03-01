<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modulearn</title>
    </head>
    <body>
    
        <?php echo $__env->make('partial/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="content">
            <div id="search-by-topic">
                <h2>Search by Topic</h2>
                <div id="link-box">
                    <?php $topics=array('Computer Science','Math','English', 'Electrical Engineering', 'Physics',
                    'Biology', 'History', 'Religion', '') ?>
                    <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span><a href="/"><?php echo e($topic); ?></a></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div id="getting-started">
                <h2>Getting Started</h2>
                <div class='spacer'></div>
                <p>
                    Modulearn is a platform for creating more than 
                    just tutorials. It is a place for connecting ideas
                    together to make learning easy and intuitive.
                </p>
                <p> 
                    Users
                    are also encouraged to use the platform to write
                    projects they work on and their findings, to utilize
                    this site as one large knowledge base.
                </p>

                <div>
                    <div><button>Start Creating</button></div>
                    <div><button>Explore</button></div>
                </div>
            </div>

            <div id="popular-slider">
                <h2>Popular Threads</h2>
            </div>
        </div>

    </body>
</html>
<!-- Provides common imports, elements -->

<head>
    <link href="<?php echo e(asset('css/site.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="header">
        
        <?php if(isset($user)): ?>
            <span><a href="/account" class="color-matrix"><?php echo e(($user->isAdmin ? "(root) " : "")); ?>$<?php echo e($user->name); ?></a></span>
            <span><a href="/logout">Log Out</a></span>

            <?php if($user->isAdmin): ?>
                <span><a href="/manage">Manage</a></span>
            <?php endif; ?>
        <?php else: ?>
            <span><a href="/login">Login/Signup</a></span>
        <?php endif; ?>

        <span><a href="/topics">Topics</a></span>
        <span><a href="/about">About</a></span>
        <span><a href="/">Home</a></span>

        <div id="header-logo">
            <a href="/">
                <img src="<?php echo e(asset('images/logo_128.png')); ?>" alt="Logo" height="32" width="32">
            </a>
        </div>

        <div id="search-bar">
            <input type="text" placeholder="search topic...">
            <button>Search</button>
        </div>
    </div>
</body>
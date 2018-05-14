<!-- Provides common imports, elements -->

<head>
    <link href="{{asset('css/site.css')}}" rel="stylesheet">
</head>

<body>
    <div id="header">
        
        @if(isset($user))
            <span><a href="/account" class="color-matrix">{{($user->isAdmin ? "(root) " : "")}}${{$user->name}}</a></span>
            <span><a href="/logout">Log Out</a></span>

            @if($user->isAdmin)
                <span><a href="/manage">Manage</a></span>
            @endif
        @else
            <span><a href="/login">Login/Signup</a></span>
        @endif

        <span><a href="/topics">Topics</a></span>
        <span><a href="/about">About</a></span>
        <span><a href="/">Home</a></span>

        <div id="header-logo">
            <a href="/">
                <img src="{{asset('images/logo-128.png')}}" alt="Logo" height="32" width="32">
            </a>
        </div>

        <div id="search-bar">
            <input type="text" placeholder="search topic...">
            <button>Search</button>
        </div>
    </div>
</body>
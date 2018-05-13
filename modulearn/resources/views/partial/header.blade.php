<!-- Provides common imports, elements -->

<head>
    <link href="{{asset('css/site.css')}}" rel="stylesheet">
</head>

<body>
    <div id="header">
        
        @if(isset($user))
            <span><a href="/account" class="color_matrix">{{($user->isAdmin ? "(root) " : "")}}${{$user->name}}</a></span>
            <span><a href="/logout">Log Out</a></span>
        @else
            <span><a href="/login">Login/Signup</a></span>
        @endif

        <span><a href="/topics">Topics</a></span>
        <span><a href="/about">About</a></span>
        <span><a href="/">Home</a></span>

        <div id="header_logo">
            <a href="/">
                <img src="{{asset('images/logo_128.png')}}" alt="Logo" height="32" width="32">
            </a>
        </div>

        <div id="search_bar">
            <input type="text" placeholder="search topic...">
            <button>Search</button>
        </div>
    </div>
</body>
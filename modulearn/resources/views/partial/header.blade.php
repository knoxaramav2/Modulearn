<!-- Provides common imports, elements -->

<head>

    <link href="{{asset('css/site.css')}}" rel="stylesheet">

</head>

<body>
    <div id="header">
        
        @if(isset($user))
            <span><a href="" class="color_matrix">${{$user->name}}</a></span>
            <span><a href="/logout">Log Out</a></span>
        @else
            <span><a href="/login">Login/Signup</a></span>
        @endif

        <span><a href="/topics">Topics</a></span>
        <span><a href="/about">About</a></span>
        <span><a href="/">Home</a></span>
    </div>
</body>
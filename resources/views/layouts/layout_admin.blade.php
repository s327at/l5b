<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/../css/app.css" rel="stylesheet">
    <script src="/../js/app.js"></script>
</head>
<body>
<div class="row">
<nav class="navmenu navmenu-default" role="navigation">
    <div class = "col-md-2">
        <ul class=" nav navmenu-nav">
            <li role="presentation" class="active"><a href="{{route('admin')}}">Articles</a><br></li>
            <li role="presentation"><a href="{{route('admin.alluser')}}">Users</a><br></li>
            <li role="presentation"><a href="{{route('admin.comment')}}">Comments</a><br></li>
            <li role="presentation"><a href="{{route('blog.user.index')}}">My profile</a><br></li>
        </ul>
    </div>
</nav>

@yield('main')

</div>
</body>
</html>


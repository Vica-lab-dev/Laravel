<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.cart') }}">Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.user-books')}}">Your Books</a>
            </li>
        </ul>

    @if(isset($book))
        <form class="form-inline mx-auto" action="{{ route('user.search', ['book' => $book->id]) }}" method="GET">
            <div>
                <input class="mr-sm-2" type="search" name="search" placeholder="Search">
                <button type="submit" class="btn btn-outline-light">Search</button>
            </div>
        </form>
        @else
            <form class="form-inline mx-auto">
                <div>
                    <input class="mr-sm-2" type="search" name="search" placeholder="Search is not available" disabled>
                </div>
            </form>
        @endif
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-2">
                <a href="#" class="btn btn-light">Login</a>
            </li>
            <li class="nav-item ">
                <a href="#" class="btn btn-outline-light">Register</a>
            </li>
        </ul>

    </div>
</nav>
    @yield('content')
</body>
</html>

@extends("cdnlink");

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <form class="d-flex" method="GET" action="{{ route('research')}}">
            <input name="name" class="form-control me-2" type="search" placeholder="Find your friends">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>

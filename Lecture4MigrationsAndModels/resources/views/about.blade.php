@extends("layout")
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @section("PageTitle")
        About
    @endsection
</head>
<body>
    @section("p")
        <p class="Center">My name is {{$ime}} {{$prezime}}.</p>
    @endsection

</body>
</html>

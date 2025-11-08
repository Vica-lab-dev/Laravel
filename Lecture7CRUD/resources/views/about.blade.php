@extends("layout")

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @section("PageTitle")
        About
    @endsection

    @section("p")
        <p class="Center">My name is {{$ime}} {{$prezime}}.</p>
    @endsection



@extends('layout')

@section('content')
    <body class="bg-dark">
        <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-dark">
            <div class="text-center">
                <h1 class="text-white mb-4">Find your city</h1>

                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
                @endif

                <form method="GET" action="{{ route('forecast.search') }}">
                    <div class="h-100"  style="background-color: #0a0a0ad">
                        <input class="form-control" type="text" name="city" placeholder="Enter city name">
                        <button type="submit" class="btn btn-primary w-100">Find</button>
                    </div>
                </form>
            </div>
        </div>
        @foreach($cities->userFavourites as $city)
            <p>{{$city->name}} - {{$city->temperature}}</p>

        @endforeach
    </body>
@endsection

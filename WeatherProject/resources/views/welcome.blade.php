@php use App\Http\ForecastHelper;use Illuminate\Support\Facades\Session; @endphp
@extends('layout')

@section('content')

    <body class="bg-dark">

    <div>
        @foreach($userFavourites as $userFavourite)

            @php
                $color = ForecastHelper::getColorByTemperature($userFavourite->userCity->todaysForecast?->temperature);
                $icon = ForecastHelper::getIconByWeatherType($userFavourite->userCity->todaysForecast?->weather_type);
                $probability = ForecastHelper::getProbabilityIcon($userFavourite->userCity->todaysForecast?->probability);
            @endphp
            <div class="bg-dark p-3 text-white">
                <p class="m-0">{{ $userFavourite->userCity->name }}</p>
                <i class="fa-solid {{ $icon }}"></i><span>{{ $userFavourite->userCity->todaysForecast?->temperature }}°C</span>
                @if($probability !== null)
                    <i class="fa-solid {{ $probability }}"></i><span>{{ $userFavourite->userCity->todaysForecast?->probability}}%</span>
                @endif
            </div>

        @endforeach
    </div>

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-dark">
        <div class="text-center">
            <h1 class="text-white mb-4">Find your city</h1>

            @if(Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
            @endif

            <form method="GET" action="{{ route('forecast.search') }}">
                <div class="h-100" style="background-color: #0a0a0ad">
                    <input class="form-control" type="text" name="city" placeholder="Enter city name">
                    <button type="submit" class="btn btn-primary w-100">Find</button>
                </div>
            </form>
        </div>
    </div>
    </body>
@endsection

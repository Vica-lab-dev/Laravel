@extends('layout')

@section('content')


    <body class="bg-dark">

        <div>
            @foreach($userFavourites as $userFavourite)

                @php
                    $color = \App\Http\ForecastHelper::getColorByTemperature($userFavourite->userCity->todaysForecast->temperature);
                    $icon = \App\Http\ForecastHelper::getIconByWeatherType($userFavourite->userCity->todaysForecast->weather_type);
                @endphp
              <div class="bg-dark p-3 text-white">
                  <p class="m-0">{{ $userFavourite->userCity->name }}</p>
                  <i class="fa-solid {{ $icon }}"></i><span>{{ $userFavourite->userCity->todaysForecast->temperature }}</span>
              </div>

            @endforeach
        </div>

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
    </body>
@endsection

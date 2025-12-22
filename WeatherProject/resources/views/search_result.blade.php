@extends('layout')

@section('content')

    <div class="d-flex flex-wrap container mt-5">

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger fw-bold col-12">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
            <a class="btn btn-primary" href="/login">Log in</a>
        @endif

        @foreach($cities as $city)
            @php $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type) @endphp
                <p>
                    @if(in_array($city->id, $userFavourites))
                        <a href="{{route('forecasts.delete', ['city' => $city->id])}}" class="btn btn-primary">
                            <i class="fa-solid fa-heart"></i></a>

                        @else
                        <a href="{{route('city.favourite', ['city' => $city->id]) }}" class="btn btn-primary">
                            <i class="fa-regular text-white fa-heart"></i></a>

                    @endif


                    <a class="btn btn-primary text-white me-4" href="{{route('forecast.permalink', ['city' => $city->name])}}">
                   <i class="fa-solid"></i> {{ $city->name }}
                </a></p>
        @endforeach

    </div>
@endsection

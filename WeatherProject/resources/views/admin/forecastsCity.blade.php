@extends("admin.layout")

@section("content")

    <form method="POST" action="{{ route('forecasts.update') }}" >
        {{ csrf_field() }}
        <div>
            <select name="city_id" class="form-select">
                @foreach(\App\Models\CitiesModel::all() as $city)

                    <option value="{{ $city->id }}">
                        {{ $city->name }}
                    </option>

                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <input class="form-control" type="text" name="temperature" placeholder="Enter temperature">
        </div>

        <div class="mb-3">
            <select name="weather_type" class="form-select">
                @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                    <option>{{ $weather }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input class="mb-3 form-control" type="text" name="probability" placeholder="Chance of precipitation">
        </div>

        <div class="mb-3">
            <input class=" form-control" type="date" name="forecast_date">
        </div>

        <button class="btn btn-outline-primary col-12">Save</button>
    </form>

    <div class="d-flex flex-wrap mt-3" style="gap: 10px;">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <div>
                <p class="mb-1">{{ $city->name }}</p>


                <ul class="list-group mb-4">
                    @foreach($city->forecasts as $forecast)

                        @php
                            $color = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                            $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                        @endphp

                        <li class="list-group-item">{{ $forecast->forecast_date }} -
                            <i class="fa-solid {{$icon}}"></i>
                            <span style="color: {{ $color }}">{{ $forecast->temperature }}</span></li>
                    @endforeach
                </ul>
            </div>

        @endforeach
    </div>

@endsection

<form method="POST" action="{{ route('forecasts.update') }}">
    {{ csrf_field() }}

    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)

            <option value="{{ $city->id }}">
                {{ $city->name }}
            </option>

        @endforeach
    </select>

    <input type="text" name="temperature" placeholder="Enter temperature">

    <select name="weather_type">
        <option>Rainy</option>
        <option>Sunny</option>
        <option>Snowy</option>
    </select>

    <input type="text" name="probability" placeholder="Chance of precipitation">
    <input type="date" name="forecast_date">
    <button>Save</button>
</form>

<div>
    @foreach(\App\Models\CitiesModel::all() as $city)

        <p>{{ $city->name }}</p>

        @foreach($city->forecasts as $forecast)
            <ul>
                <li>{{ $forecast->forecast_date }} - {{ $forecast->temperature }}</li>
            </ul>
        @endforeach


    @endforeach




</div>

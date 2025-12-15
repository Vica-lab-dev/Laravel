@foreach($city->forecasts as $forecast)
    <p>{{ $forecast->id}} -
        temperature: {{ $forecast->temperature }},
        date: {{ $forecast->forecast_date }}
    </p>
@endforeach


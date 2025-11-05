@extends ("layout")

    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section("PageTitle")
        Welcome
    @endsection
</head>
<body>


    @section("PageContent")
        @if($hour >= 0 && $hour <= 12)
            <p class="Center">Good Morning!</p>
        @else
            <p class="Center">Good Day!</p>
        @endif

        <p class="Center">Current hour: {{$hour}}</p>
        <p class="Center">Current time: {{ date("H:i:s") }}</p>

        @php
            $products = DB::table('products')
                ->select('id', 'name')
                ->orderBy('id', 'desc')
                ->limit(6)
                ->get();
        @endphp

        <p class="Center">
            @foreach ($products as $product)
                {{ $product->id }} - {{ $product->name }}<br>
            @endforeach
        </p>



    @endsection





</body>
</html>








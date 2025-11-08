@extends ("layout")

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section("PageTitle")
        Welcome
    @endsection

    @section("PageContent")
        @if($hour >= 0 && $hour <= 12)
            <p class="Center">Good Morning!</p>
        @else
            <p class="Center">Good Day!</p>
        @endif

        <p class="Center">Current hour: {{$hour}}</p>
        <p class="Center">Current time: {{ date("H:i:s") }}</p>


        @foreach($products as $product)
            <p class="Center">{{$product->name}}</p>
        @endforeach

    @endsection







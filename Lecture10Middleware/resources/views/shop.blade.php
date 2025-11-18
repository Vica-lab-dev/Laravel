@extends("layout")

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section("PageTitle")
        Shop
    @endsection


    @section("shopSection")

            @foreach($products as $product)
                <div>
                    <p class="Center">{{$product->name}}</p>
                    <p class="Center">{{$product->amount}}</p>
                </div>
            @endforeach
    @endsection


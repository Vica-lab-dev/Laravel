@extends("layout")

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section("PageTitle")
        Shop
    @endsection


    @section("shopSection")

            @foreach($products as $product)
                <div class="Center flex">
                    <p>{{$product->name}}</p>
                    <p>{{ $product->description  }}</p>
                    <a href="{{ route('products.permalink', ['product' => $product->id ]) }}">Detail</a>
                </div>
            @endforeach
    @endsection


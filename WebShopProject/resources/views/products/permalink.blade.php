@extends("layout")

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section("PageTitle")
    Permalink
@endsection

@section("PageContent")
    <p class="Center">{{ $product->name }}</p>

    <form class="Center" action="{{ route('cart.add') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection


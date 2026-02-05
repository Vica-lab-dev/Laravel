@extends('bootstraplink')

<div class="container my-5">
    <h2 class="text-center mb-4">Your Cart</h2>

    @if(count($products) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">Author: {{ $product->author }}</p>
                            <p class="card-text fw-bold">Price: ${{ number_format($product->price, 2) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <form action="{{ route("user.cart-forget", ['book' => $product->name]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col">
                <div class="card h-100 shadow-sm bg-light">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Total Price</h5>
                        <p class="card-text fw-bold">${{ number_format($count, 2) }}</p>

                        <form action="" method="POST" class="mt-3 w-100">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                Finish
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <p class="text-center fs-5 text-muted">Your cart is empty.</p>
@endif

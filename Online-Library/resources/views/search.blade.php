@extends('layout')

@section('title', 'Library')

@section('content')
    <div class="container mt-5">
        <div class="row g-4 d-flex justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 shadow-lg rounded-3 overflow-hidden border-0 hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('/storage/images/books/' . $book->image) }}"
                             class="card-img-top mx-auto mt-3"
                             style="width: 150px; height: 220px; object-fit: cover; border-radius: 0.5rem;"
                             alt="{{ $foundBook->name }}">

                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title fw-bold">{{ $foundBook->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted fst-italic">{{ $foundBook->author }}</h6>
                            <p class="card-text flex-grow-1 text-truncate" style="max-height: 4.5em; overflow: hidden; color: #555;">
                                {{ $foundBook->description }}
                            </p>
                            <p class="card-text fw-bold h5 mb-3">${{ number_format($foundBook->price, 2) }}</p>
                            <a href="#"
                               class="btn btn-gradient text-white fw-bold py-2 px-4 rounded"
                               style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); transition: all 0.2s;">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <style>
        .card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.2);
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
    </style>
@endsection

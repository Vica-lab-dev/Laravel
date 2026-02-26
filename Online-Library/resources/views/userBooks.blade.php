@extends('bootstraplink')

<div class="container mt-5">
    <div class="row g-4">

        @forelse($items as $item)
            @if($item->book)
            <div class="col-md-3 mb-5">
                <div class="card h-100 shadow-sm align-items-center">
                    <div class="card-body d-flex flex-column text-center">
                        <div>
                            <img style="width: 200px;" src="{{asset('/storage/images/books/'. $item->book->image)}} " alt="BookImage">
                        </div>
                        <h5 class="card-title">{{ $item->book->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->book->author }}</h6>
                        <p class="card-text flex-grow-1">{{ $item->book->description }}</p>
                        <a href="{{ route('pdf.text', ['book' => $item->book->id]) }}" class="btn btn-primary mt-auto">PDF</a>
                    </div>
                </div>
            </div>
            @endif
        @empty
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 300px;">
                <p class="fw-bold fs-4 text-center text-muted">You do not have any ordered book!</p>
            </div>
        @endforelse

    </div>
</div>

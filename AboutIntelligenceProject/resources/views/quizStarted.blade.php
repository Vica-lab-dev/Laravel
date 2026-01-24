@extends('cdn')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4 text-center" style="max-width: 400px; width: 100%;">
            <h3 class="card-title mb-3">Your Intelligence Result</h3>
            <p class="display-5 fw-bold">{{ $count }}%</p>
            <p class="text-muted">This is the total score based on your quiz selections.</p>

            <a href="/" class="btn btn-primary mt-3 w-100">Go Back to Homepage</a>
        </div>
    </div>
@endsection

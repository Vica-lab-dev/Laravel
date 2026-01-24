@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <h3 class="card-title text-center mb-4">Your Interests Description</h3>

            @foreach($selected as $select => $describe)
                <p><strong>{{ $select }}:</strong> {{ $describe }}</p>
            @endforeach

            <div class="text-center mt-3">
                <a href="{{ route('quiz') }}" class="btn btn-primary">Take the Quiz</a>
            </div>
        </div>
    </div>
@endsection

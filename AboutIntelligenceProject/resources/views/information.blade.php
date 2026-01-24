@extends('cdn')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="max-width: 450px; width: 100%;">
            <h3 class="card-title text-center mb-4">Your Information</h3>

            <p><strong>Name:</strong> {{ $information->name }}</p>
            <p><strong>Email:</strong> {{ $information->email }}</p>
            <p><strong>Country:</strong> {{ $information->country }}</p>

            <div class="text-center mt-3">
                <a class="btn btn-primary" href="{{ route('allInformation.show') }}">
                    Let's create intelligence category
                </a>
            </div>
        </div>
    </div>
@endsection

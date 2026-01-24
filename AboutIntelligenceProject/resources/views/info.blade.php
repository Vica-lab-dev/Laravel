@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card p-4 shadow" style="max-width: 500px; width: 100%;">
            <h3 class="card-title text-center mb-4">Enter Your Information</h3>

            <form method="POST" action="{{ route('create') }}">
                @csrf

                <input type="hidden" id="ID" name="user_id" value="{{ Auth::id() }}" required>

                <div class="mb-3">
                    <label for="nameID" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="nameID" name="name" placeholder="Example: John Doe"
                           required>
                </div>

                <div class="mb-3">
                    <label for="emailID" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailID" name="email" placeholder="you@example.com"
                           required>
                </div>

                <div class="mb-3">
                    <label for="countryID" class="form-label">Country</label>
                    <input type="text" class="form-control" id="countryID" name="country" placeholder="Your country"
                           required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>
    </div>
@endsection


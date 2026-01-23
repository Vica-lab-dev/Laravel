@php use Illuminate\Support\Facades\Auth; @endphp
@extends('cdn')

<form method="POST" action="{{ route('create') }}">
    @csrf
    <div class="mb-3">
        <input type="hidden" id="ID" name="user_id" value="{{ Auth::id() }}" required>
    </div>
    <div class="mb-3">
        <label for="nameID" class="form-label">Enter your full name</label>
        <input type="text" class="form-control" id="nameID" name="name" required>
    </div>
    <div class="mb-3">
        <label for="emailID" class="form-label">Enter your email</label>
        <input type="email" class="form-control" id="emailID" name="email" required>
    </div>
    <div class="mb-3">
        <label for="countryID" class="form-label">Enter your country</label>
        <input type="text" class="form-control" id="countryID" name="country" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

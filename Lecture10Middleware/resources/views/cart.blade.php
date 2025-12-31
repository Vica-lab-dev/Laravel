@extends('layout')

@section('PageContent')
    @foreach($cart as $product => $amount)
        {{ $product . " " . $amount }}

    @endforeach

@endsection

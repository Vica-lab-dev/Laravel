@extends('layout')

@section('PageContent')

    @foreach($products as $product)
        <p>{{ $product->name }}</p>
    @endforeach

@endsection

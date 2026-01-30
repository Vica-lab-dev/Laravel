@extends('layout')

@section('PageContent')

    @foreach($combinedItems as $item)
        <p>{{ $item['name'] }}</p>
        <p>{{ $item['amount'] }}</p>
        <p>{{ $item['price'] }}</p>
        <p>{{ $item['total'] }}</p>
    @endforeach

@endsection

@extends('cdn')
@foreach($selected as $select => $describe)
    <p>{{$select}}: {{$describe}}</p>

@endforeach
<a href="{{ route('quiz') }}" class="btn btn-primary">Take the Quiz</a>

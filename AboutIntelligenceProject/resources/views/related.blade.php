@extends('cdn')

@foreach($information as $info)
    @foreach($info->allInformation as $singleInfo )
        <p> {{$singleInfo->id}},
            {{$info->name}},
            {{$info->country}},
            {{$singleInfo->category}}
            {{$singleInfo->percent}}%
        </p>
    @endforeach
@endforeach

<a href="/interests" class="btn btn-primary">Are you curious? Click!</a>

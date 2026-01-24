@extends('layout')

@section('content')
    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="text-center">
            @foreach($information as $info)
                @foreach($info->allInformation as $singleInfo)
                    <div class="card mb-3 shadow-sm" style="max-width: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $info->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $info->country }}</h6>
                            <p class="card-text">
                                Category: {{ $singleInfo->category }} <br>
                                Percent: {{ $singleInfo->percent }}%
                            </p>
                        </div>
                    </div>
                @endforeach
            @endforeach

            <a href="/interests" class="btn btn-primary mt-3">Are you curious? Click!</a>
        </div>
    </div>
@endsection


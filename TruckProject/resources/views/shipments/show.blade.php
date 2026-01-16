@extends('layout')

@section('content')
    <div class="shipment-show-container">
        <div class="shipment-card">
            <h1 class="title">{{ $shipment->title }}</h1>

            <div class="route">
                <p><strong>From:</strong> {{ $shipment->from_city }}, {{ $shipment->from_country }}</p>
                <p><strong>To:</strong> {{ $shipment->to_city }}, {{ $shipment->to_country }}</p>
            </div>

            <p><strong>Price:</strong> ${{ number_format($shipment->price, 2) }}</p>
            <p><strong>Status:</strong>
                <span class="status {{ strtolower($shipment->status) }}">
                {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
            </span>
            </p>

            <p class="details"><strong>Details:</strong> {{ $shipment->details }}</p>

            <div>
                @foreach($shipment->documents as $document)
                    <p><strong>Document: </strong>
                        <a target="_blank" href="/storage/documents/{{$document->document_name}}">
                            {{ $document->document_name }}
                        </a></p>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .shipment-show-container {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        .shipment-card {
            max-width: 500px;
            width: 100%;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fdfdfd;
            box-shadow: 3px 3px 15px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .shipment-card:hover {
            transform: translateY(-5px);
            box-shadow: 4px 4px 20px rgba(0,0,0,0.15);
        }

        .shipment-card .title {
            font-size: 2em;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }

        .shipment-card .route p {
            margin: 5px 0;
        }

        .shipment-card p {
            margin: 8px 0;
            color: #555;
            font-size: 1em;
        }

        .shipment-card .details {
            font-style: italic;
            color: #666;
        }
    </style>
@endsection

@php use App\Models\User; @endphp
@extends('layout')

@section('content')
    <div class="shipments-container">
        @foreach($shipments as $shipment)
            <div class="shipment-card">
                <h2 class="title">{{ $shipment->title }}</h2>
                <p><strong>From:</strong> {{ $shipment->from_city }}, {{ $shipment->from_country }}</p>
                <p><strong>To:</strong> {{ $shipment->to_city }}, {{ $shipment->to_country }}</p>
                <p><strong>Price:</strong> ${{ number_format($shipment->price, 2) }}</p>
                <p><strong>Status:</strong> <span
                        class="status {{ strtolower($shipment->status) }}">{{ $shipment->status }}</span></p>
                <p class="details">{{ $shipment->details }}</p>

                <div>
                    <a href="{{ route('shipments.show', ['shipment' => $shipment->id]) }}">View Shipment</a>
                </div>

                <form action="">
                    <select name="user">
                        <option selected disabled>None</option>
                        @foreach(User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button>Assigned</button>
                </form>
            </div>
        @endforeach
    </div>

    <style>
        .shipments-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .shipment-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #f9f9f9;
        }

        .shipment-card:hover {
            transform: translateY(-5px);
        }

        .shipment-card .title {
            margin: 0 0 10px;
            font-size: 1.5em;
            color: #333;
        }

        .shipment-card p {
            margin: 5px 0;
            color: #555;
        }

        .shipment-card .details {
            margin-top: 10px;
            font-style: italic;
            font-size: 0.9em;
            color: #666;
        }
    </style>
@endsection

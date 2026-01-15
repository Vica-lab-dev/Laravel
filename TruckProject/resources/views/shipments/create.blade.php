@php use App\Models\Shipment; @endphp
@extends('layout')

@section('content')
    <div class="shipment-form-container">
        <h1>Create New Shipment</h1>

        <form action="{{ route('shipments.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>

            <label for="from_city">From City</label>
            <input type="text" name="from_city" id="from_city" value="{{ old('from_city') }}" required>

            <label for="to_city">To City</label>
            <input type="text" name="to_city" id="to_city" value="{{ old('to_city') }}" required>

            <label for="from_country">From Country</label>
            <input type="text" name="from_country" id="from_country" value="{{ old('from_country') }}" required>

            <label for="to_country">To Country</label>
            <input type="text" name="to_country" id="to_country" value="{{ old('to_country') }}" required>

            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" required>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                @foreach(Shipment::ALLOWED_STATUSES as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>

            <div>
                <label for="documents">Documents</label>
                <input type="file" name="documents[]" multiple required>
            </div>

            <div>
                <label for="user_id">User ID</label>
                <input type="number" name="user_id" id="user_id" value="{{ old('user_id') }}" required>
            </div>

            <div>
                <label for="details">Details</label>
                <textarea name="details" id="details" rows="4">{{ old('details') }}</textarea>
            </div>
            <button type="submit">Create Shipment</button>
        </form>
    </div>

    <style>
        .shipment-form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .shipment-form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input, select, textarea {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #2779bd;
        }
    </style>
@endsection

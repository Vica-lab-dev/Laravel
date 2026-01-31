
<div class="shipment-form-container">

    <form wire:submit="submit">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

        <div>
            <label for="title">Title</label>
            <input type="text" wire:model="title" >
        </div>

        <div>
            <label for="from_city">From City</label>
            <input type="text" wire:model="from_city" >
        </div>

        <div>
            <label for="to_city">To City</label>
            <input type="text" wire:model="to_city">
        </div>

        <div>
            <label for="from_country">From Country</label>
            <input type="text" wire:model="from_country" >
        </div>

        <div>
            <label for="to_country">To Country</label>
            <input type="text" wire:model="to_country">
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" wire:model="price">
        </div>

        <div>
            <label for="price">Client</label>
            @error('client_id')
                <p>{{ $message }}</p>
            @enderror
            <input type="number" wire:blur="validateUser" wire:model="client_id">
        </div>

        <div>
            <select wire:model="status">
                @foreach($statuses as $singleStatus)
                    <option value="{{ $singleStatus }}">{{ $singleStatus }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="documents">Documents</label>
            <input type="file" wire:model="documents" multiple >
        </div>

        <div>
            <label for="details">Details</label>
            <textarea wire:model="details" rows="4"></textarea>
        </div>
        <button>Create Shipments</button>
    </form>

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

</div>


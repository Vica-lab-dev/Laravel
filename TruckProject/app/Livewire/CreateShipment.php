<?php

namespace App\Livewire;

use App\Http\Requests\NewShipmentRequest;
use App\Models\Shipment;
use App\Models\ShipmentDocuments;
use App\Models\User;
use App\Services\ShipmentService;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateShipment extends Component
{
    use WithFileUploads;

    public string $title;
    public string $from_city;
    public string $to_city;
    public string $from_country;
    public string $to_country;
    public int $price;
    public array $statuses = [];
    public string $status = '';
    public int $client_id;
    public string $clientError;
    public array $documents;
    public string $details;
    public string $test;

    public function validateUser(User $user)
    {
        $this->validate([
            'client_id' => 'required|integer|exists:users,id',
        ]);
    }


    public function render()
    {
        return view('components.create-shipment');
    }

    public function mount()
    {
        $this->statuses = Shipment::ALLOWED_STATUSES;
    }

    public function submit(ShipmentService $shipmentService)
    {
        $request = new NewShipmentRequest();

        $data = $this->validate($request->rules());

        $shipmentService->store($data);

        Shipment::create([
            'title' => $data['title'],
            'from_city' => $data['from_city'],
            'to_city' => $data['to_city'],
            'from_country' => $data['from_country'],
            'to_country' => $data['to_country'],
            'price' => $data['price'],
            'client_id' => $data['client_id'],
            'details' => $data['details'],
            'status' => $data['status'],
        ]);

        ShipmentDocuments::create([
           'document' => $data['documents'],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Shipment;
use App\Models\ShipmentDocuments;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class ShipmentController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $shipment = Cache::remember('unassigned_shipments', 30,
            fn () => Shipment::unassignedShipments()->get()
        );
        return view('shipments.index', ['shipments' => $shipment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('canViewCreationPage', Shipment::class);

        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewShipmentRequest $request)
    {
        Gate::authorize('create', Shipment::class);

        $shipment = Shipment::create($request->validated());

        $fileTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        foreach($request->file('documents') as $document)
        {
            if(str_starts_with($document->getMimeType(), 'image/'))
            {
                $name = $this->imageUpload($document, "documents/$shipment->id");

                $name = $shipment->id."/".$name;

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $name
                ]);
            }
            elseif(in_array($document->getMImeType(), $fileTypes))
            {
                $extension = $document->getClientOriginalExtension();

                $filename = uniqid().".".$extension;

                $path = $document->StoreAs("documents/{$shipment->id}", $filename, 'public');

                $path = str_replace("documents/", "", $path);

                ShipmentDocuments::create([
                    'shipment_id' => $shipment->id,
                    'document_name' => $path,
                ]);
            }

        }


        return redirect()->route('shipments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        Gate::authorize('view', $shipment);
        return view('shipments.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        Gate::authorize('canViewEdit', Shipment::class);
        return view('shipments.edit', compact('shipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->validated());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipments)
    {
        //
    }

    public function assignUser(Request $request, Shipment $shipment): RedirectResponse
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        $shipment->user_id = $request->user_id;
        $shipment->status = Shipment::STATUS_IN_PROGRESS;

        $shipment->save();


        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewShipmentRequest;
use App\Models\Shipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipment = Cache::remember('unassigned_shipments', 30, function ()
        {
            return Shipments::where('status', Shipments::STATUS_UNASSIGNED)->get();
        });
        return view('shipments.index', ['shipments' => $shipment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewShipmentRequest $request)
    {
        Shipments::create($request->validated());
        return redirect()->route('shipments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipments $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipments $shipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipments $shipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipments $shipments)
    {
        //
    }
}

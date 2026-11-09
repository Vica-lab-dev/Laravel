<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRequest;
use App\Models\Provider;
use Illuminate\Support\Facades\Gate;

class ProviderController extends Controller
{
    public function index()
    {
        Gate::authorize(ability: 'viewAny', arguments: Provider::class);
        $providers = Provider::all();
        return response()->json($providers);
    }

    public function show(Provider $provider)
    {
        Gate::authorize(ability: "view", arguments: $provider);

        return response()->json($provider);
    }

    public function store(StoreProviderRequest $request)
    {
        Gate::authorize(ability: 'create', arguments: Provider::class);

        $data = $request->validated();

        $provider = $request->user()->provider()->create($data);

        return response()->json([
            "message" => "Provider created.",
            "provider" => $provider,
        ], status: 201);
    }
}

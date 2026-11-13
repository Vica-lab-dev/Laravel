<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
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

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        Gate::authorize(ability: 'update', arguments: $provider);

        $data = $request->validated();
        $provider->update($data);

        return response()->json([
            "message" => "Provider updated.",
            "provider" => $provider,
        ]);
    }

    public function destroy(Provider $provider)
    {
        Gate::authorize(ability: 'delete', arguments: $provider);
        $provider->delete();

        return response()->json([
            "message" => "Provider deleted.",
        ]);
    }

    public function restore(string $id)
    {
        $provider = Provider::withTrashed()->findOrFail($id);

        Gate::authorize(ability: 'restore', arguments: $provider);

        $provider->restore();

        return response()->json([
            "message" => "Provider restored.",
            "provider" => $provider,
        ]);
    }
}

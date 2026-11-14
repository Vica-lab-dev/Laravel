<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function index()
    {
        Gate::authorize("viewAny",Service::class);

        $services = Service::all();

        return response()->json($services);
    }

    public function show(Service $service)
    {
        Gate::authorize("view", $service);

        return response()->json($service);
    }

    public function store(StoreServiceRequest $request)
    {
        Gate::authorize("create",Service::class);

        $data = $request->validated();

        $categoryIds = $data["category_ids"];
        unset($data["category_ids"]);

        $service = DB::transaction(function () use ($request, $data, $categoryIds) {
            $service = $request->user()->provider->services()->create($data);

            $service->categories()->sync($categoryIds);

            return $service;
        });

        return response()->json($service->load("categories"),201);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        Gate::authorize("update", $service);

        $data = $request->validated();

        $service->update($data);

        return response()->json($service);
    }

    public function destroy(Service $service)
    {
        Gate::authorize("delete", $service);

        $service->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Enums\Users\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function index()
    {
        Gate::authorize(ability: "viewAny", arguments: Service::class);

        $services = Service::all();

        return response()->json($services);
    }

    public function show(Service $service)
    {
        Gate::authorize(ability: "view", arguments: $service);

        return response()->json($service);
    }

    public function store(StoreServiceRequest $request)
    {
        Gate::authorize(ability: "create", arguments: Service::class);

        $data = $request->validated();

        $categoryIds = $data["category_ids"];
        unset($data["category_ids"]);

        $service = DB::transaction(function () use ($request, $data, $categoryIds) {
            $service = $request->user()->provider->services()->create($data);

            $service->categories()->sync($categoryIds);

            return $service;
        });

        return response()->json($service->load("categories"), status: 201);
    }
}

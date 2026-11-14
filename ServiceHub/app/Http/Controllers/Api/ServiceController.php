<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
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
}

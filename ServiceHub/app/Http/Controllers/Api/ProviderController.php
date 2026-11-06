<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}

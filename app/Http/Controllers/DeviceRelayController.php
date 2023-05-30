<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceRelayResource;
use App\Models\DeviceRelay;
use Illuminate\Http\Request;

class DeviceRelayController extends Controller
{
    public function index()
    {
        return DeviceRelayResource::collection(DeviceRelay::all());
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return new DeviceRelayResource(DeviceRelay::create($request->validated()));
    }

    public function show(DeviceRelay $deviceRelay)
    {
        return new DeviceRelayResource($deviceRelay);
    }

    public function update(Request $request, DeviceRelay $deviceRelay)
    {
        $request->validate([

        ]);

        $deviceRelay->update($request->validated());

        return new DeviceRelayResource($deviceRelay);
    }

    public function destroy(DeviceRelay $deviceRelay)
    {
        $deviceRelay->delete();

        return response()->json();
    }
}

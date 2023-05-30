<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return DeviceResource::collection(Device::all());
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return new DeviceResource(Device::create($request->validated()));
    }

    public function show(Device $device)
    {
        return new DeviceResource($device);
    }

    public function update(Request $request, Device $device)
    {
        $request->validate([

        ]);

        $device->update($request->validated());

        return new DeviceResource($device);
    }

    public function destroy(Device $device)
    {
        $device->delete();

        return response()->json();
    }
}

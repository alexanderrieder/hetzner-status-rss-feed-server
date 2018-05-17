<?php

namespace App\Http\Controllers\Api;

use App\Model\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 *
 */
class DeviceTrackingController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create_device(Request $request)
    {
        $this->validate($request, [
            'os' => 'required',
            'version' => 'required',
        ]);
        $device = Device::create(['os' => $request->get('os'), 'version' => $request->get('version')]);

        return response()->json(['device_id' => $device->id]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Device        $device
     */
    public function create_track(Request $request, Device $device)
    {
        $this->validate($request, [
            'projects' => 'required',
            'access' => 'required',
        ]);
        $device->trackings()->create(['projects' => $request->get('projects'), 'access' => $request->get('access')]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::paginate(10);
        return view('admin.data-lokasi', compact('locations'));
    }

    public function storeLocation()
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('kepala')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $validate = Validator::make(request()->all(), [
            'name' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);
        if ($validate->fails()) {
            // return ResponseFormatter::error($validate, $validate->messages(), 417);
            return redirect()->back()->withInput()->withError($validate);
        }
        // $code = env('APP_URL') . '/api/satpam/' . request()->latitude . '/' . request()->longitude . '/scan';
        Location::create([
            'name' => request()->name,
            'latitude' => request()->latitude,
            'longitude' => request()->longitude,
        ]);
        // return ResponseFormatter::success($barcode, 'Data barcode baru berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data lokasi berhasil ditambahkan');
    }

    public function downloadBarcode($locationID)
    {
        $user = request()->user();
        if (!$user->hasRole('admin') && !$user->hasRole('kepala')) {
            // return ResponseFormatter::error(null, 'User tidak punya kewenangan', 403);
            return redirect()->back()->with('status', 'User tidak punya kewenangan');
        }
        $barcode = Location::find($locationID);
        if (!$barcode) {
            // return ResponseFormatter::error(null, 'Data shift tidak ditemukan', 404);
            return redirect()->back()->with('status', 'Data lokasi tidak ditemukan');
        }
        // return $barcode;
        // $hehe = public_path();
        // return $hehe;
        QrCode::size(500)
            ->format('svg')
            ->generate(env('APP_URL') . 'scan-lokasi/' . $locationID . '/detail',public_path('QrCode/'.$barcode->name.'-qrcode-'.$locationID.'.svg'));
        return response()->download('QrCode/'.$barcode->name.'-qrcode-'.$locationID.'.svg');
        // return $ajg;
        // return 'hehe';
    }
}

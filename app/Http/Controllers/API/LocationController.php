<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request) {
        $id = $request->input('id');
        $location_name = $request->input('location_name');

        if($id) {
            $location = Location::find($id);

            if($location) {
                return ResponseFormatter::success(
                    $location,
                    'Data Berhasil Diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }

        }

        $location = Location::all();


        return ResponseFormatter::success(
            $location,
            'Data Perusahaan berhasil diambil'
        );
    }
}

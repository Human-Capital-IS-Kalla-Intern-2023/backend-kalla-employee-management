<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request) {
        $id = $request->input('id');

        if($id) {
            $location = Location::find($id);

            if($location)
            {
                return ResponseFormatter::success(
                    $location,
                    'Data lokasi berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data lokasi tidak ada',
                    404
                );
            };
        }

        $location = Location::all();


        return ResponseFormatter::success(
            $location,
            'Data Perusahaan berhasil diambil'
        );

       
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'location_name' => ['required','string','max:255'],
            ]);

            $data = Location::create([
                'location_name' => $request->location_name,
            ]);


            return ResponseFormatter::success(
                $data,
                'Data Berhasil Ditambahkan'
            );

        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $data = $request->validate([
                'location_name' => ['required','string','max:255'],
            ]);
    
            $item = Location::findOrFail($id);
    
            $item->update($data);
    
            return ResponseFormatter::success(
                $data,
                'Data Berhasil Diubah'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
        
    }


}

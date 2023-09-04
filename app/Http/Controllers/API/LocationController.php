<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request) {
        
        $location = Location::all();


        return ResponseFormatter::success(
            $location,
            'Data Perusahaan berhasil diambil'
        );

       
    }

    public function store(Request $request) {
        try {
            //define validation rules
            $validator = Validator::make($request->all(), [
                'location_name'     => 'required|string',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }


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

    public function show(string $id)
    {
        try {

            $location = Location::findOrFail($id);
    
            return ResponseFormatter::success(
                $location,
                'Data berhasil diambil'
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

            //define validation rules
            $validator = Validator::make($request->all(), [
                'location_name'     => 'required|string',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }
    
            $item = Location::findOrFail($id);
            
            $item->update([
                'location_name' => $request->location_name,
            ]);
    
            return ResponseFormatter::success(
                $item,
                'Data Berhasil Diubah'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
        
    }

    public function destroy(string $id)
    {
        try {
            

            $location = Location::findOrFail($id);

            //delete post
            $location->delete();

            return ResponseFormatter::success(
                'Data Berhasil Dihapus'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }


}

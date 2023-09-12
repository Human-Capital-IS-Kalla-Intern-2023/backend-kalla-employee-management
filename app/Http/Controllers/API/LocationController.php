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

        $search = $request->get('search');

        $location = Location::query()->when($search, function($query) use($search) {
            $query->where('location_name','like','%'.$search.'%');
        })->get();
        

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data lokasi berhasil diambil',
            'data' => $location,
        ], 200);

    }

    public function store(Request $request) {

        $validation = $this->validate($request, [
            'location_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        // //define validation rules
        // $validator = Validator::make($request->all(), [
        //     'location_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
        // ]);

        // //check if validation fails
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status_code' => 400,
        //         'status' => 'error',
        //         'message' => $validator->errors(),
        //     ]);
        // }

        $data = Location::create([
            'location_name' => $request->location_name,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Lokasi berhasil ditambahkan',
            'data' => $data,
        ], 200);
        
    }

    public function show(string $id)
    {
        try {

            $location = Location::findOrFail($id);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Lokasi berhasil diambil',
                'data' => $location,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 500);
        }
    }

    public function update(Request $request, string $id) {

        $validation = $this->validate($request, [
            'location_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        try {

            $item = Location::findOrFail($id);
        
            //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'location_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
            // ]);

            //  //check if validation fails
            // if ($validator->fails()) {
            //     return response()->json([
            //         'status_code' => 400,
            //         'status' => 'error',
            //         'message' => $validator->errors(),
            //     ]);
            // }
    
            
            $item->update([
                'location_name' => $request->location_name,
            ]);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Lokasi berhasil diubah',
                'data' => $item,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {            
            $location = Location::findOrFail($id);

            //delete post
            $location->delete();

            return response()->json([
                'status_code' => 200, 
                'status' => 'success',
                'message' => 'Lokasi berhasil dihapus',
                'data' => $location,
            ], 200);


        } catch (Exception $error) {

            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500, 
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Lokasi masih digunakan tabel lain',
                ], 500);
            }

            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'ID Tidak ditemukan',
            ], 404);
        
        }
    }



}

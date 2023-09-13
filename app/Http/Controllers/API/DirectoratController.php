<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Directorat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DirectoratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        

        $search = $request->get('search');

        $directorat = Directorat::query()->when($search, function($query) use($search) {
            $query->where('directorat_name','like','%'.$search.'%');
        })->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Directorat berhasil diambil',
            'data' => $directorat,
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validation = $this->validate($request, [
            'directorat_name'     => 'required|string|unique:directorats,directorat_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        $data = Directorat::create([
            'directorat_name' => $request->directorat_name,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Direktorat berhasil ditambahkan',
            'data' => $data,
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $data = Directorat::findOrFail($id);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Direktorat berhasil diambil',
                'data' => $data,
            ],200 );
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id) {

        $validation = $this->validate($request, [
            'directorat_name'     => 'required|string|unique:directorats,directorat_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        try {
            $item = Directorat::findOrFail($id);


            //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'directorat_name'     => 'required|string|unique:directorats,directorat_name,NULL,id,deleted_at,NULL|max:255',
            // ]);

            // //check if validation fails
            // if ($validator->fails()) {
            //     return response()->json([
            //         'status_code' => 400,
            //         'status' => 'error',
            //         'message' => $validator->errors(),
            //     ]);
            // }


            $item->update([
                'directorat_name' => $request->directorat_name,
            ]);

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Direktorat berhasil diubah',
                'data' => $item,
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {
            $directorat = Directorat::findOrFail($id);

            //delete post
            $directorat->delete();

            // return ResponseFormatter::success('', 'Data Berhasil Dihapus', 200);
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Direktorat berhasil dihapus',
                'data' => $directorat,
            ], 200);

        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500,
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Direktorat masih digunakan tabel lain',
                ], 500);
            }

            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);

        }
    }

}

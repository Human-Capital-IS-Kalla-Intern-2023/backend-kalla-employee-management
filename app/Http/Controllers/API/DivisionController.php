<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Division;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->get('search');

        $division = Division::query()->when($search, function($query) use($search){
            $query->where('division_name', 'LIKE', "%".$search."%");
        })->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Posisi baru berhasil ditampilkan',
            'data' => $division,
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
        // try {
        //     //define validation rules
        //     $validator = Validator::make($request->all(), [
        //         'division_name'     => 'required|string|unique:divisions,division_name|max:255',
        //     ]);

        //      //check if validation fails
        //     if ($validator->fails()) {
        //         $errors  = $validator->errors()->first();

        //         return ResponseFormatter::error('', $errors, 400);
        //     }

        //     $data = Division::create([
        //         'division_name' => $request->division_name,
        //     ]);


        //     return ResponseFormatter::success(
        //         $data,
        //         'Data Berhasil Ditambahkan'
        //     );

        // } catch (Exception $error) {
        //     return ResponseFormatter::error([
        //                 'message' => 'Something went wrong',
        //                 'error' => $error,
        //     ], 'Error', 500);
        // }

        $validation = $request->validate([
            'division_name' => ['required','string']
        ]);
        

        $data = Division::create([
            'division_name' => $validation['division_name'],
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Divisi baru berhasil ditambahkan',
            'data' => $data,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $data = Division::findOrFail($id);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Divisi berhasil diambil',
                'data' => $data,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 500);
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
            'division_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        try {
            // //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'division_name'     => 'required|string|unique:divisions,division_name|max:255',
            // ]);

            
            //  //check if validation fails
            // if ($validator->fails()) {
            //     $errors  = $validator->errors()->first();
            //     // $errors  = $validator->errors();

            //     return ResponseFormatter::error('', $errors,400);

            // }
    
            $item = Division::findOrFail($id);
    
            $item->update([
                'division_name' => $request->division_name,
            ]);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Divisi berhasil diubah',
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        try {
            $division = Division::findOrFail($id);

            //delete post
            $division->delete();

            return response()->json([
                'status_code' => 200, 
                'status' => 'success',
                'message' => 'Divisi berhasil dihapus',
                'data' => $division,
            ], 200);


        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500, 
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Divisi masih digunakan tabel lain',
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

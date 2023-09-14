<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Section;
use DragonCode\Contracts\Cashier\Config\Queues\Unique;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->get('search');

        $section = Section::query()->when($search, function($query) use($search){
            $query->where('section_name', 'LIKE', "%".$search."%");
        })->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Posisi baru berhasil ditampilkan',
            'data' => $section,
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
        
        $validation = $request->validate([
            'section_name' => ['required','unique:sections,section_name,NULL,id,deleted_at,NULL','string']
        ]);
        

        $data = Section::create([
            'section_name' => $validation['section_name'],
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data berhasil disimpan',
            'data'  => $data,
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $data = Section::findOrFail($id);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Seksi berhasil diambil',
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
            'section_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        try {
            // //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'section_name'     => 'required|string|unique:sections,section_name|max:255',
            // ]);

            
            //  //check if validation fails
            // if ($validator->fails()) {
            //     $errors  = $validator->errors()->first();
            //     // $errors  = $validator->errors();

            //     return ResponseFormatter::error('', $errors,400);

            // }
    
            $item = Section::findOrFail($id);
    
            $item->update([
                'section_name' => $request->section_name,
            ]);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Seksi berhasil diubah',
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
            $section = Section::findOrFail($id);

            //delete post
            $section->delete();

            return response()->json([
                'status_code' => 200, 
                'status' => 'success',
                'message' => 'Seksi berhasil dihapus',
                'data' => $section,
            ], 200);


        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500, 
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Seksi masih digunakan tabel lain',
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

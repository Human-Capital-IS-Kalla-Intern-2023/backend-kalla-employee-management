<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Section;
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
            $query->where('nip', 'LIKE', "%".$search."%");
        })->get();

        return ResponseFormatter::success(
            $section,
            'Data Section berhasil diambil'
        );
 
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
        //         'section_name'     => 'required|string|unique:sections,section_name|max:255',
        //     ]);

        //      //check if validation fails
        //     if ($validator->fails()) {
        //         $errors  = $validator->errors()->first();

        //         return ResponseFormatter::error('', $errors, 400);
        //     }

        //     $data = Section::create([
        //         'section_name' => $request->section_name,
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
            'section_name' => ['required','string']
        ]);
        

        Section::create([
            'section_name' => $validation['section_name'],
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $data = Section::findOrFail($id);
    
            return ResponseFormatter::success(
                $data,
                'Data berhasil diambil'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
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
        try {
            //define validation rules
            $validator = Validator::make($request->all(), [
                'section_name'     => 'required|string|unique:sections,section_name|max:255',
            ]);

            
             //check if validation fails
            if ($validator->fails()) {
                $errors  = $validator->errors()->first();
                // $errors  = $validator->errors();

                return ResponseFormatter::error('', $errors,400);

            }
    
            $item = Section::findOrFail($id);
    
            $item->update([
                'section_name' => $request->section_name,
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        try {
            $section = Section::findOrFail($id);

            //delete post
            $section->delete();

            return ResponseFormatter::success('', 'Data Berhasil Dihapus', 200);


        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return ResponseFormatter::error('','Tidak dapat menghapus, Section masih digunakan tabel lain', 500);
            }

            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }
}

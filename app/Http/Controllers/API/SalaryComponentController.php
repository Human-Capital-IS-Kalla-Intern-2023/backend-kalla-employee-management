<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SalaryComponent;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SalaryComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $components = SalaryComponent::query()->when($search, function($query) use($search) {
            $query->where('component_name','like','%'.$search.'%');
        })->get();
        

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Komponen Gaji berhasil diambil',
            'data' => $components,
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
    public function store(Request $request)
    {

        $validation = $request->validate([
            'component_name' => ['required','unique:salary_components,component_name,NULL,id,deleted_at,NULL','string'],
            'type' => ['required','in:fixed pay,deductions'],
            'is_hide' => ['required','boolean'],
            'is_edit' => ['required','boolean'],
            'is_active' => ['required','boolean'],
        ]);

        $salarycomponent = SalaryComponent::create([
            'slug' => $validation['slug'],
            'component_name' => $validation['component_name'],
            'type' => $validation['type'],
            'is_hide' => $validation['is_hide'],
            'type' => $validation['type'],
            'is_edit' => $validation['is_edit'],
            'is_active' => $validation['is_active'],

        ]);

        
        try {

            $salarycomponent = SalaryComponent::create([
            'slug' => $validation['slug'],
            'component_name' => $validation['component_name'],
            'type' => $validation['type'],
            'is_hide' => $validation['is_hide'],
            'type' => $validation['type'],
            'is_edit' => $validation['is_edit'],
            'is_active' => $validation['is_active'],
        ]);
            
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Komponen Gaji berhasil ditambahkan',
                'data' => $salarycomponent,
            ], 200);
         } catch (Exception $error) {
             return response()->json([
                 'status_code' => 500,
                 'status' => 'error',
                 'message' => 'Komponen gaji tidak ditemukan',
             ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        try {
            $component = SalaryComponent::findOrFail($id);

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Komponen Gaji berhasil ditambahkan',
                'data' => $component,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Komponen gaji tidak ditemukan',
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
    public function update(Request $request, String $id)
    {
        $validation = $request->validate([
            'component_name' => ['required','string','unique:salary_components,component_name,'.$id.',id,deleted_at,NULL'],
            'type' => ['required','in:fixed pay,deductions'],
            'is_hide' => ['boolean'],
            'is_edit' => ['boolean'],
            'is_active' => ['boolean'],
        ]);

        
        try {
            $component = SalaryComponent::findOrFail($id);

            $component->update([
                'component_name' => $request->component_name,
                'slug' => Str::slug($request->component_name),
                'type' => $request->type,
                'is_hide' => $request->is_hide,
                'is_edit' => $request->is_edit,
                'is_active' =>  $request->is_active
            ]);
            
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Komponen Gaji berhasil ditambahkan',
                'data' => $component,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Komponen gaji tidak ditemukan',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        try {            
            $component = SalaryComponent::findOrFail($id);

            //delete post
            $component->delete();

            return response()->json([
                'status_code' => 200, 
                'status' => 'success',
                'message' => 'Komponen berhasil dihapus',
                'data' => $component,
            ], 200);


        } catch (Exception $error) {

            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500, 
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Komponen masih digunakan tabel lain',
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SalaryComponent;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function store(Request $request, String $id)
    {

        $validation = $request->validate([
            'slug' => ['required','unique:salary_components,slug,NULL,id,deleted_at,NULL','string'],
            'component_name' => ['required','unique:salary_components,component_name,NULL,id,deleted_at,NULL','string'],
            'type' => ['required','unique:salary_components,type,NULL,id,deleted_at,NULL','string'],
        ]);

        
        try {
            $component = SalaryComponent::findOrFail($id);

            $component = SalaryComponent::create([
                'slug' => $validation['slug'],
                'component_name' => $validation['component_name'],
                'type' => $validation['type'],
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
     * Display the specified resource.
     */
    public function show(SalaryComponent $salarycomponent)
    {
    
        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Komponen Gaji berhasil diambil',
            'data' => $salarycomponent,
        ], 200);
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalaryComponent $salarycomponent)
    {

        $salarycomponent->delete();

        return response()->json([
            'status_code' => 200, 
            'status' => 'success',
            'message' => 'Lokasi berhasil dihapus',
            'data' => $salarycomponent,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SalaryCompany;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;

class SalaryCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $components = SalaryCompany::query()->when($search, function ($query) use ($search) {
            $query->where('component', 'like', '%' . $search . '%');
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
            'component' => ['required', 'unique:salary_companies,component,NULL,id,deleted_at,NULL', 'string'],
            'company_id' => ['required', 'string'],
            'type' => ['required', 'in:fixed pay,deductions'],
            'is_hide' => ['required', 'boolean'],
            'is_edit' => ['required', 'boolean'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {

            $component = SalaryCompany::create([
                'component' => $request->component,
                'company_id' => $request->company_id,
                'order' => $request->order,
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
     * Display the specified resource.
     */
    public function show(String $id)
    {
        try {
            $component = SalaryCompany::where('company_id', $id)->orderBy('order')->get();

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
        $validation = $this->validate($request, [
            'component' => ['required', 'string', 'unique:salary_companies,component,' . $id . ',id,deleted_at,NULL'],
            'company_id' => ['required', 'string'],
            'order' => ['required', 'string'],
            'type' => ['required', 'in:fixed pay,deductions'],
            'is_hide' => ['boolean'],
            'is_edit' => ['boolean'],
            'is_active' => ['boolean'],
        ]);


        try {
            $component = SalaryCompany::findOrFail($id);

            $component->update([
                'component' => $request->component,
                'company_id' => $request->company_id,
                'order' => $request->order,
                'type' => $request->type,
                'is_hide' => $request->is_hide,
                'is_edit' => $request->is_edit,
                'is_active' =>  $request->is_active
            ]);

            // if ($component->getOriginal('order') > $component->order) {
            //     # code...
            //     $list = [
            //         $component->order, $component->getOriginal('order')
            //     ];
            // } else {
            //     $list = [
            //         $component->getOriginal('order'), $component->order
            //     ];
            // }

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
            $component = SalaryCompany::findOrFail($id);

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

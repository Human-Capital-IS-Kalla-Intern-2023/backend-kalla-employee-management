<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $salaries = Salary::query()->when($search, function($query) use($search){
            $query->where('salary_name', 'LIKE', "%".$search."%");
        })->with([
            'company',
            'salaryDetail',
        ])->get();

        $dataSalary = [];

        for($i = 0; $i < $salaries->count(); $i++) {
            $salary = [
                "id" => $salaries[$i]->id,
                "salary_name" => $salaries[$i]->salary_name,
                "company_name" => $salaries[$i]->company->company_name,
                "is_active" => $salaries[$i]->is_active,
                "created_at" => $salaries[$i]->created_at,
                "updated_at" => $salaries[$i]->updated_at,
                "component" => $salaries[$i]->salaryDetail->count(),
            ];

            $dataSalary[] = $salary;
        }

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Posisi berhasil diambil',
            'data' => $dataSalary,
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
        $validation = $this->validate($request, [
            'location_name'     => 'required|string|unique:locations,location_name,NULL,id,deleted_at,NULL|max:255',
        ]);

        $data = Salary::create([
            'location_name' => $request->location_name,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Lokasi berhasil ditambahkan',
            'data' => $data,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}

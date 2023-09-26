<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\SalaryCompany;
use App\Models\SalaryComponent;
use App\Models\SalaryDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                "company_id" => $salaries[$i]->company->id,
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
            'message' => 'Data Gaji berhasil diambil',
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
            'salary_name'     => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id,deleted_at,NULL',
            'is_active' => 'boolean',
        ]);

        if($request->filled('component_name')) {
            $this->validate($request, [
                'component_name' => 'required|unique:salary_components,component_name,NULL,id,deleted_at,NULL|string',
                'type' => 'required|in:fixed pay,deductions',
            ]);
        }

        try {
            DB::beginTransaction();

            $salary = Salary::firstOrCreate(
                [
                    'salary_name' => $request->salary_name,
                    'company_id' => $request->company_id,
                ],
                [
                    'salary_name' => $request->salary_name,
                    'company_id' => $request->company_id,
                    'is_active' => 1,
                ]
            );

            if($request->filled('component_name')) {
                $component = SalaryDetail::create([
                    'component_name' => $request->component_name,
                    'salary_id' => $salary->id,
                    'order' => 1,
                    'type' => $request->type,
                    'is_hide' => 0,
                    'is_edit' => 1,
                    'is_active' =>  1,
                ]);
                
                $salary['components'] = $component->component_name;
            }

            

            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Gaji berhasil ditambahkan',
                'data' => $salary,
            ], 200);

        } catch (\Exception $error) {
            DB::rollback(); // Rollback transaksi jika ada kesalahan
            // throw $error; // Re-throw exception jika perlu
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => $error,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

        try {
            $salary = Salary::with([
                'company',
                'salaryDetail',
            ])->where('id', $id)->get()->first();

            

            $destructureSalary = [
                "id" => $salary->id,
                "salary_name" => $salary->salary_name,
                "company_id" => $salary->company->id,
                "company_name" => $salary->company->company_name,
                "is_active" => $salary->is_active,
                "created_at" => $salary->created_at,
                "updated_at" => $salary->updated_at,
                "component" => $salary->salaryDetail,
            ];

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data berhasil diambil',
                'data' => $destructureSalary,
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
        $validation = $this->validate($request, [
            'salary_name'     => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id,deleted_at,NULL',
            'is_active' => 'required|boolean',
            'components.*.order' => 'required|integer',
            'components.*.salary_component_id' => 'required|string',
            'components.*.type' => 'required|in:fixed pay,deductions',
            'components.*.is_hide' => 'required|boolean',
            'components.*.is_edit' => 'required|boolean',
            'components.*.is_active' => 'required|boolean',
        ]);

        try {
            DB::beginTransaction();

            $salary = Salary::findOrFail($id);


            $salary->update([
                'salary_name' => $request->salary_name,
                'company_id' => $request->company_id,
                'is_active' => $request->is_active,
            ]);

            SalaryDetail::where('salary_id',$id)->delete();            

            $components = $request->components;

            for($i = 0; $i < count($components); $i++ ) {
                $salaryComponentId = $components[$i]['salary_component_id'];

                
                
                $data = SalaryComponent::find($salaryComponentId);
                if($data) {
                    
                    SalaryDetail::create([
                        'salary_id' => $salary->id,
                        'order' => $components[$i]['order'],
                        'salary_component_id' =>$salaryComponentId,
                        'type' => $components[$i]['type'],
                        'is_hide' => $components[$i]['is_hide'],
                        'is_edit' => $components[$i]['is_edit'],
                        'is_active' =>  $components[$i]['is_active'],
                    ]);

                }  else {
                    SalaryDetail::create([
                        'salary_id' => $salary->id,
                        'order' => $components[$i]['order'],
                        'component_name' => $salaryComponentId,
                        'type' => $components[$i]['type'],
                        'is_hide' => $components[$i]['is_hide'],
                        'is_edit' => $components[$i]['is_edit'],
                        'is_active' =>  $components[$i]['is_active'],
                    ]);
                }

            }

            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Salary berhasil ditambahkan',
                'data' => $salary,
            ], 200);

        } catch (\Exception $error) {
            DB::rollback(); // Rollback transaksi jika ada kesalahan
            // throw $error; // Re-throw exception jika perlu
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => $error,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $salary = Salary::findOrFail($id);
            $salary->delete();
            SalaryDetail::where('salary_id',$id)->delete();


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => $salary->salary_name.' berhasil dihapus',
                'data' => $salary,
            ]);

        } catch (Exception $error) {

            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);

        }
    }
}

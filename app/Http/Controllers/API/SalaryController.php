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

        $salaries = Salary::query()->when($search, function ($query) use ($search) {
            $query->where('salary_name', 'LIKE', "%" . $search . "%");
        })->with([
            'company',
            'salaryDetail',
        ])->get();

        $dataSalary = [];

        $filteredSalaries = $salaries->filter(function ($salary) {
            return $salary->salaryDetail->count() > 0;
        });

        $dataSalary = $filteredSalaries->map(function ($salary) {
            return [
                "id" => $salary->id,
                "salary_name" => $salary->salary_name,
                "company_id" => $salary->company->id,
                "company_name" => $salary->company->company_name,
                "is_active" => $salary->is_active,
                "created_at" => $salary->created_at,
                "updated_at" => $salary->updated_at,
                "component" => $salary->salaryDetail->count(),
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Gaji berhasil diambil',
            'data' => $dataSalary,
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->validate($request, [
            'salary_name'     => 'required|unique:salaries,salary_name,NULL,id,deleted_at,NULL|string|max:255',
            'company_id' => 'required|exists:companies,id,deleted_at,NULL',
            'is_active' => 'required|boolean',
            'components' => 'required',
            'components.*.order' => 'required|integer',
            'components.*.component_name' => 'required|string',
            'components.*.type' => 'required|in:fixed pay,deductions',
            'components.*.is_hide' => 'required|boolean',
            'components.*.is_edit' => 'required|boolean',
            'components.*.is_active' => 'required|boolean',
        ]);


        DB::beginTransaction();

        try {
            $salary = Salary::create(
                [
                    'salary_name' => $request->salary_name,
                    'company_id' => $request->company_id,
                    'is_active' => $request->is_active,
                ]
            );

            $components = $request->components;

            for ($i = 0; $i < count($components); $i++) {
                $component = $components[$i]['component_name'];

                $data = SalaryComponent::where('component_name', $component)->get()->first();

                if ($data) {
                    SalaryDetail::create([
                        'salary_id' => $salary->id,
                        'order' => $components[$i]['order'],
                        'salary_component_id' => $data->id,
                        'type' => $components[$i]['type'],
                        'is_hide' => $components[$i]['is_hide'],
                        'is_edit' => $components[$i]['is_edit'],
                        'is_active' =>  $components[$i]['is_active'],
                    ]);
                } else {
                    SalaryDetail::create([
                        'salary_id' => $salary->id,
                        'order' => $components[$i]['order'],
                        'component_name' => $components[$i]['component_name'],
                        'type' => $components[$i]['type'],
                        'is_hide' => $components[$i]['is_hide'],
                        'is_edit' => $components[$i]['is_edit'],
                        'is_active' =>  $components[$i]['is_active'],
                    ]);
                }
            }

            $salary['components'] = $components;

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

            $destructureSalaryDetail = [];

            foreach ($salary->salaryDetail as $item) {
                $checkData = null;

                if (is_null($item->component_name)) {
                    $checkData = SalaryComponent::where('id', $item->salary_component_id)->get()->first();
                }

                $salaryComponent = [
                    "order" =>  $item->order,
                    "component_name" => $checkData ? $checkData->component_name : $item->component_name,
                    "type" =>  $item->type,
                    "is_hide" =>  $item->is_hide,
                    "is_edit" =>  $item->is_edit,
                    "is_active" =>  $item->is_active,
                ];

                $destructureSalaryDetail[] = $salaryComponent;
            }

            $destructureSalary = [
                "id" => $salary->id,
                "salary_name" => $salary->salary_name,
                "company_id" => $salary->company->id,
                "company_name" => $salary->company->company_name,
                "is_active" => $salary->is_active,
                "created_at" => $salary->created_at,
                "updated_at" => $salary->updated_at,
                "component" => $destructureSalaryDetail,
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $this->validate($request, [
            'salary_name'     => 'required|unique:salaries,salary_name,'.$id.',id,deleted_at,NULL|string|max:255',
            'company_id' => 'required|exists:companies,id,deleted_at,NULL',
            'is_active' => 'required|boolean',
            'components' => 'required',
            'components.*.order' => 'required|integer',
            'components.*.component_name' => 'required|string',
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

            SalaryDetail::where('salary_id', $id)->delete();

            $components = $request->components;

            for ($i = 0; $i < count($components); $i++) {
                $component = $components[$i]['component_name'];

                $data = SalaryComponent::where('component_name', $component)->get()->first();

                if ($data) {
                    SalaryDetail::create([
                        'salary_id' => $salary->id,
                        'order' => $components[$i]['order'],
                        'salary_component_id' => $data->id,
                        'type' => $components[$i]['type'],
                        'is_hide' => $components[$i]['is_hide'],
                        'is_edit' => $components[$i]['is_edit'],
                        'is_active' =>  $components[$i]['is_active'],
                    ]);
                } else {
                    SalaryDetail::create([
                        'salary_id' => $salary->id,
                        'order' => $components[$i]['order'],
                        'component_name' => $components[$i]['component_name'],
                        'type' => $components[$i]['type'],
                        'is_hide' => $components[$i]['is_hide'],
                        'is_edit' => $components[$i]['is_edit'],
                        'is_active' =>  $components[$i]['is_active'],
                    ]);
                }
            }

            $salary['components'] = $components;

            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => $salary->salary_name . ' berhasil diubah',
                'data' => $salary,
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
            $salary = Salary::findOrFail($id);
            $salary->delete();
            SalaryDetail::where('salary_id', $id)->delete();


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => $salary->salary_name . ' berhasil dihapus',
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

    public function updateIsActive(Request $request, String $id) {
        $validation = $this->validate($request, [
            'is_active' => 'required|boolean',
        ]);

        try {

            $salary = Salary::findOrFail($id);


            $salary->update([
                'is_active' => $request->is_active,
            ]);

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => $salary->salary_name . ' berhasil diubah',
                'data' => $salary,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        

    }
}

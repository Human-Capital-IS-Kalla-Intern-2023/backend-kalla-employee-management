<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Eligible;
use App\Models\Employee;
use App\Models\Position;
use App\Models\EmployeeDetail;
use App\Models\Salary;
use App\Models\SalaryComponent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EligibleController extends Controller
{
    public function index(Employee $employee, Position $position)
    {
        // try {

            $dataEmployee = EmployeeDetail::with([
                'position',
                'eligible',
                'employee',
            ])
                // ->withTrashed()
                ->where('employee_id', $employee->id)
                ->where('position_id', $position->id)
                ->get()->first();

            $dataEmployeeNotActive = EmployeeDetail::with([
                'position',
                'eligible'
            ])
                // ->withTrashed()
                ->where('employee_id', $employee->id)
                ->where('position_id', '!=', $position->id)
                ->has('eligible')
                ->get();

            $additionalPosition = [];

            for ($i = 0; $i < $dataEmployeeNotActive->count(); $i++) {
                $employee = [
                    "id_additional_position" => $dataEmployeeNotActive[$i]->position->id,
                    "position_name" => $dataEmployeeNotActive[$i]->position->position_name,
                ];

                $additionalPosition[] = $employee;
            }
            

            $salaryDetailDb = (!empty($dataEmployee->eligible->salary_detail)) ?  json_decode($dataEmployee->eligible->salary_detail) : null;
            
            // Query Dari Salary Detail
            $querySalaryComponents = Salary::with(['salaryDetail'])->where('company_id', $position->company_id)->where('is_active', 1)->get();

                if ($querySalaryComponents) {
                    // Mengakses data salary_detail dari objek Company
                    $salaryDetails = $querySalaryComponents->flatMap(function ($salary) {
                        return $salary->salaryDetail;
                    });

                    $destructureSalaryDetail = [];

                    foreach ($salaryDetails as $item) {
                        $checkData = null;

                        if (is_null($item->component_name)) {
                            $checkData = SalaryComponent::where('id', $item->salary_component_id)->get()->first();
                        }

                        if($item->is_active) {
                            $salaryComponent = [
                                "component_id" => $item->id,
                                "order" =>  $item->order,
                                "component_name" => $checkData ? $checkData->component_name : $item->component_name,
                                "type" =>  $item->type,
                                "is_hide" =>  $item->is_hide,
                                "is_edit" =>  $item->is_edit,
                                "is_active" =>  $item->is_active,
                            ];
    
                            $destructureSalaryDetail[] = $salaryComponent;
                        }
                        
                    }
                    // Gunakan collect() untuk membuat koleksi dari array
                    $destructuredCollection = collect($destructureSalaryDetail);
                    $uniqueSalaryDetails = $destructuredCollection->reduce(function ($carry, $item) {
                        $componentName = $item['component_name'];

                        // Jika $componentName belum ada dalam $carry, tambahkan
                        if (!isset($carry[$componentName])) {
                            $carry[$componentName] = $item;
                        }

                        return $carry;
                    }, []);

                    // Hasil berupa array dengan data unik berdasarkan 'component_name'
                    $uniqueSalaryDetails = array_values($uniqueSalaryDetails);

                    $result = [];

                    // Loop melalui elemen-elemen array1
                    foreach ($uniqueSalaryDetails  as $item1) {
                        $found = 0;

                            if(isset($salaryDetailDb)) {
                                foreach ($salaryDetailDb as $item2) {
                                    if ($item1['component_name'] === $item2->component_name) {
                                        $found = 1;
                                        break;
                                    }
                                }
                            }

                        $result[] = [
                            'salary_component_id' => $item1["component_id"],
                            "component_name" => $item1["component_name"],
                            'type' => $item1['type'],
                            'order' => $item1['order'],
                            'is_hide' => $item1['is_hide'],
                            'is_edit' => $item1['is_edit'],
                            'is_active' => $item1['is_active'],
                            "is_status" => $found ? 1 : 0
                        ];

                        
                    }

                     // Desructrue Karyawan
                    $employeeDestructure = [
                        "id" => $dataEmployee->id,
                        "nip" => $dataEmployee->employee->nip,
                        "fullname" => $dataEmployee->employee->fullname,
                        "nickname" => $dataEmployee->employee->nickname,
                        "hire_date" => $dataEmployee->employee->hire_date,
                        "company_email" => $dataEmployee->employee->company_email,
                        "id_position" => $dataEmployee->position->id,
                        "position_name" => $dataEmployee->position->position_name,
                        "company_name" => $dataEmployee->position->company[0]->company_name,
                        "directorate_name" => $dataEmployee->position->directorate[0]->directorat_name,
                        "division_name" => $dataEmployee->position->division[0]->division_name,
                        "section_name" => $dataEmployee->position->section[0]->section_name,
                        "grade_name" => $dataEmployee->position->job_grade[0]->grade_name,
                        "type_bank" => (!empty($dataEmployee->eligible->type_bank)) ? $dataEmployee->eligible->type_bank : null,
                        "account_number" => (!empty($dataEmployee->eligible->account_number)) ? $dataEmployee->eligible->type_bank : null,
                        "salary_detail" => $result,
                        "additional_position" => $additionalPosition,
                    ];

                    return response()->json([
                        'status_code' => 200,
                        'status' => 'success',
                        'message' => 'Karyawan baru berhasil diambil',
                        'data' => $employeeDestructure,
                    ], 200);
                } else {
                    // Handle jika objek $querySalaryComponents kosong
                    return response()->json([
                        'status_code' => 404,
                        'status' => 'error',
                        'message' => 'Data tidak ditemukan',
                    ], 404);
                }

            

        // } catch (Exception $error) {
        //     return response()->json([
        //         'status_code' => 404,
        //         'status' => 'error',
        //         'message' => 'Data tidak ditemukan',
        //     ], 404);
        // }
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'employee_detail_id' => ['required'],
            'type_bank' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'salary_detail' => ['required']
        ]);

        DB::beginTransaction(); // Start a database transaction

        try {

            // Simpan data karyawan
            $employee = new Eligible;
            $employee->employee_detail_id = $request->employee_detail_id;
            $employee->type_bank = $request->type_bank;
            $employee->account_number = $request->account_number;
            $employee->account_name = $request->account_name;
            // $employee->save();

            // Simpan detail gaji dalam format JSON
            $salaryDetails = [];

            foreach ($request->salary_detail as $detail) {
                if($detail['is_status'] == 1) {
                    $salaryDetails[] = [
                        'component_id' => $detail['component_id'],
                        'order' => $detail['order'],
                        'component_name' => $detail['component_name'],
                        'type' => $detail['type'],
                        'is_hide' => $detail['is_hide'],
                        'is_edit' => $detail['is_edit'],
                        'is_active' => $detail['is_active']
                    ];
                }
            }

            $employee->salary_detail = json_encode($salaryDetails);
            $employee->save();
            DB::commit(); // Commit the transaction
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Eligible berhasil ditambahkan',
                'data' => $employee,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on exception

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' =>  $e->getMessage(),
            ], 500);
        }
    }

    public function show(Employee $employee, Position $position)
    {
        try {
            return DB::transaction(function () use ($employee, $position) {
                $dataEmployee = EmployeeDetail::with([
                    'position',
                    'eligible',
                    'employee',
                ])
                    // ->withTrashed()
                    ->where('employee_id', $employee->id)
                    ->where('position_id', $position->id)
                    ->get()->first();

                $querySalaryComponents = Salary::with(['salaryDetail'])->where('company_id', $position->company_id)->where('is_active', 1)->get();

                if ($querySalaryComponents) {
                    // Mengakses data salary_detail dari objek Company
                    $salaryDetails = $querySalaryComponents->flatMap(function ($salary) {
                        return $salary->salaryDetail;
                    });

                    $destructureSalaryDetail = [];

                    foreach ($salaryDetails as $item) {
                        $checkData = null;

                        if (is_null($item->component_name)) {
                            $checkData = SalaryComponent::where('id', $item->salary_component_id)->get()->first();
                        }

                        if($item->is_active) {
                            $salaryComponent = [
                                "component_id" => $item->id,
                                "order" =>  $item->order,
                                "component_name" => $checkData ? $checkData->component_name : $item->component_name,
                                "type" =>  $item->type,
                                "is_hide" =>  $item->is_hide,
                                "is_edit" =>  $item->is_edit,
                                "is_active" =>  $item->is_active,
                            ];
    
                            $destructureSalaryDetail[] = $salaryComponent;
                        }
                        
                    }
                    // Gunakan collect() untuk membuat koleksi dari array
                    $destructuredCollection = collect($destructureSalaryDetail);
                    $uniqueSalaryDetails = $destructuredCollection->reduce(function ($carry, $item) {
                        $componentName = $item['component_name'];

                        // Jika $componentName belum ada dalam $carry, tambahkan
                        if (!isset($carry[$componentName])) {
                            $carry[$componentName] = $item;
                        }

                        return $carry;
                    }, []);

                    // Hasil berupa array dengan data unik berdasarkan 'component_name'
                    $uniqueSalaryDetails = array_values($uniqueSalaryDetails);

                    $employee['id_position'] = $dataEmployee->position->id;
                    $employee['position_name'] = $dataEmployee->position->position_name;
                    $employee['company_name'] = $dataEmployee->position->company[0]->company_name;
                    $employee['directorate_name'] = $dataEmployee->position->directorate[0]->directorat_name;
                    $employee['division_name'] = $dataEmployee->position->division[0]->division_name;
                    $employee['section_name'] = $dataEmployee->position->section[0]->section_name;
                    $employee['grade_name'] = $dataEmployee->position->job_grade[0]->grade_name;
                    $employee['components'] = $uniqueSalaryDetails;

                    return response()->json([
                        'status_code' => 200,
                        'status' => 'success',
                        'message' => 'Karyawan baru berhasil diambil',
                        'data' => $employee,
                    ], 200);
                } else {
                    // Handle jika objek $querySalaryComponents kosong
                    return response()->json([
                        'status_code' => 404,
                        'status' => 'error',
                        'message' => 'Data tidak ditemukan',
                    ], 404);
                }
            });
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memproses data',
            ], 500);
        }
    }

    public function update(Request $request, String $id)
    {
        $validation = $request->validate([
            'employee_detail_id' => ['required'],
            'type_bank' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'salary_detail' => ['required']
        ]);
        DB::beginTransaction(); // Start a database transaction

        try {

            $employee = Eligible::findOrFail($id);

            // Simpan data karyawan
            $employee->employee_detail_id = $request->employee_detail_id;
            $employee->type_bank = $request->type_bank;
            $employee->account_number = $request->account_number;

            // Simpan detail gaji dalam format JSON
            $salaryDetails = [];
            foreach ($request->salary_detail as $detail) {
                if($detail['is_status'] == 1) {
                    $salaryDetails[] = [
                        'component_id' => $detail['component_id'],
                        'order' => $detail['order'],
                        'component_name' => $detail['component_name'],
                        'type' => $detail['type'],
                        'is_hide' => $detail['is_hide'],
                        'is_edit' => $detail['is_edit'],
                        'is_active' => $detail['is_active'],
                    ];
                }
            }

            $employee->salary_detail = json_encode($salaryDetails);
            $employee->save();
            
            DB::commit(); // Commit the transaction
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan berhasil diubah',
                'data' => $employee,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on exception

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

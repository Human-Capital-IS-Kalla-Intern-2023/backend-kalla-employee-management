<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eligible;
use App\Models\Employee;
use App\Models\Position;
use App\Models\EmployeeDetail;
use Exception;
use Illuminate\Http\Request;

class EligibleController extends Controller
{
    public function index(Employee $employee, Position $position)
    {
        try {


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
                'position'
            ])
                // ->withTrashed()
                ->where('employee_id', $employee->id)
                ->whereNot('position_id', $position->id)
                ->get();

            $additionalPosition = [];

            for ($i = 0; $i < $dataEmployeeNotActive->count(); $i++) {
                $employee = [
                    "id_additional_position" => $dataEmployeeNotActive[$i]->position->id,
                    "position_name" => $dataEmployeeNotActive[$i]->position->position_name,
                ];

                $additionalPosition[] = $employee;
            }

            $salaryDetail = (!empty($dataEmployee->eligible->salary_detail)) ?  json_decode($dataEmployee->eligible->salary_detail) : null;

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
                "salary_detail" => $salaryDetail,
                "additional_position" => $additionalPosition,
            ];


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil diambil',
                'data' => $employeeDestructure,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'employee_detail_id' => ['required'],
            'type_bank' => ['required'],
            'account_number' => ['required'],
        ]);

        // Simpan data karyawan
        $employee = new Eligible;
        $employee->employee_detail_id = $request->employee_detail_id;
        $employee->type_bank = $request->type_bank;
        $employee->account_number = $request->account_number;
        $employee->save();

        // Simpan detail gaji dalam format JSON
        $salaryDetails = [];
        foreach ($request->salary_detail as $detail) {
            if ($detail['status'] == 1) {
                $salaryDetails[] = [
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

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Eligible berhasil diupdate',
            'data' => $employee,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'employee_detail_id' => ['required'],
            'type_bank' => ['required'],
            'account_number' => ['required'],
            'salary_detail' => ['required', 'array'],
        ]);

        // Temukan data Eligible yang ingin diupdate
        $employee = Eligible::findOrFail($id);

        // Update data karyawan
        // $employee->employee_detail_id = $request->employee_detail_id;
        $employee->type_bank = $request->type_bank;
        $employee->account_number = $request->account_number;
        $employee->account_name = $request->account_name;

        // Update detail gaji dalam format JSON
        $salaryDetails = [];
        foreach ($request->salary_detail as $detail) {
            if ($detail['status'] == 1) {
                $salaryDetails[] = [
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

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Eligible berhasil diupdate',
            'data' => $employee,
        ], 200);
    }
}

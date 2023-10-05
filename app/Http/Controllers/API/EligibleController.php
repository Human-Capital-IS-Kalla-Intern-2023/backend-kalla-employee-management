<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eligible;
use App\Models\Employee;
use App\Models\EmployeeDetail;
use Exception;
use Illuminate\Http\Request;

class EligibleController extends Controller
{ 
    public function index(string $id) {
        // try {
            

            $dataEmployee = EmployeeDetail::with([
                'position',
                'eligible',
                'employee',
            ])
            // ->withTrashed()
            ->where('employee_id', $id)
            // ->where('status', 1)
            ->get()->first();
            
            // $dataEmployee = EmployeeDetail::with([
            //     'position',
            //     'eligible',
            //     'employee',
            // ])
            // // ->withTrashed()
            // ->where('employee_id', $id)
            // ->where('status', 0)
            // ->get();

            // $dataPosition = [];

            // for ($i = 1; $i < $employees[0]->positions->count(); $i++) {
            //     $employee = [
            //         "id_additional_position" => $employees[0]->positions[$i]->id,
            //         "position_name" => $employees[0]->positions[$i]->position_name,
            //         "company_name" => $employees[0]->positions[$i]->company[0]->company_name,
            //         "directorate_name" => $employees[0]->positions[$i]->directorate[0]->directorat_name,
            //         "division_name" => $employees[0]->positions[$i]->division[0]->division_name,
            //         "section_name" => $employees[0]->positions[$i]->section[0]->section_name,
            //         "grade_main" => $employees[0]->positions[$i]->job_grade[0]->grade_name,
            //     ];

            //     $dataPosition[] = $employee;
            // }
            $salaryDetail = json_decode($dataEmployee->eligible->salary_detail);

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
                "salary_detail" => $salaryDetail,
            ];


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil diambil',
                'data' => $employeeDestructure,
                // 'data' => $dataEmployee,
            ], 200);
        // } catch (Exception $error) {
        //     return response()->json([
        //         'status_code' => 404,
        //         'status' => 'error',
        //         'message' => 'Data tidak ditemukan',
        //     ], 404);
        // }
    }

    public function store(Request $request) {
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
            if($detail['status'] == 1) {
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
            'message' => 'Karyawan berhasil dihapus',
            'data' => $employee,
        ], 200);
    }
}

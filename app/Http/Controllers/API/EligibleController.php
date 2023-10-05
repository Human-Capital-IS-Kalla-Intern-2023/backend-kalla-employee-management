<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eligible;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;

class EligibleController extends Controller
{ 
    public function index(string $id) {
        // try {
            

            $employees = Employee::with([
                'positions' => function ($query) {
                    $query->withTrashed()
                          ->orderBy('status', 'desc'); // Menambahkan ORDER BY status secara descending pada tabel pivot
                },
                'employeeDetail.eligible',
                'positions.directorate', 
                'positions.company', 
                'positions.division', 
                'positions.section', 
                'positions.job_grade'
            ])
            ->withTrashed()
            ->where('id', $id)
            ->get();


            $dataPosition = [];

            for ($i = 1; $i < $employees[0]->positions->count(); $i++) {
                $employee = [
                    "id_additional_position" => $employees[0]->positions[$i]->id,
                    "position_name" => $employees[0]->positions[$i]->position_name,
                    "company_name" => $employees[0]->positions[$i]->company[0]->company_name,
                    "directorate_name" => $employees[0]->positions[$i]->directorate[0]->directorat_name,
                    "division_name" => $employees[0]->positions[$i]->division[0]->division_name,
                    "section_name" => $employees[0]->positions[$i]->section[0]->section_name,
                    "grade_main" => $employees[0]->positions[$i]->job_grade[0]->grade_name,
                ];

                $dataPosition[] = $employee;
            }

            $employee = [
                "id" => $employees[0]->id,
                "nip" => $employees[0]->nip,
                "fullname" => $employees[0]->fullname,
                "nickname" => $employees[0]->nickname,
                "hire_date" => $employees[0]->hire_date,
                "company_email" => $employees[0]->company_email,
                "id_main_position" => $employees[0]->positions[0]->id,
                "main_position" => $employees[0]->positions[0]->position_name,
                "company_main" => $employees[0]->positions[0]->company[0]->company_name,
                "directorate_main" => $employees[0]->positions[0]->directorate[0]->directorat_name,
                "division_main" => $employees[0]->positions[0]->division[0]->division_name,
                "section_main" => $employees[0]->positions[0]->section[0]->section_name,
                "job_grade_main" => $employees[0]->positions[0]->job_grade[0]->grade_name,
                "additional_position" => $dataPosition,
            ];


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil diambil',
                'data' => $employees,
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

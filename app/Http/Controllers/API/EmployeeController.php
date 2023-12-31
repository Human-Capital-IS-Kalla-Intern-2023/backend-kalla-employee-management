<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Position;
use App\Models\EmployeeDetail;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->get('search');

        $employees = Employee::query()->when($search, function ($query) use ($search) {
            $query->where('fullname', 'like', '%' . $search . '%');
        })->with(['positions' => function ($query) {
            $query->select('positions.*', 'employee_details.status');
            $query->withTrashed()->orderBy('status', 'desc'); // Menambahkan ORDER BY status secara descending pada tabel pivot
        }])->get();



        $dataEmployee = [];

        for ($i = 0; $i < $employees->count(); $i++) {
            $dataPosition = [];

            for ($j = 1; $j < $employees[$i]->positions->count(); $j++) {
                $employee = [
                    "id_additional_position" => $employees[$i]->positions[$j]->id,
                    "position_name" => $employees[$i]->positions[$j]->position_name,
                    "company_name" => $employees[$i]->positions[$j]->company[0]->company_name,
                    "directorate_name" => $employees[$i]->positions[$j]->directorate[0]->directorat_name,
                    "division_name" => $employees[$i]->positions[$j]->division[0]->division_name,
                    "section_name" => $employees[$i]->positions[$j]->section[0]->section_name,
                    "grade_main" => $employees[$i]->positions[$j]->job_grade[0]->grade_name,

                ];

                $dataPosition[] = $employee;
            }

            $employee = [
                "id" => $employees[$i]->id,
                "nip" => $employees[$i]->nip,
                "fullname" => $employees[$i]->fullname,
                "nickname" => $employees[$i]->nickname,
                "hire_date" => $employees[$i]->hire_date,
                "company_email" => $employees[$i]->company_email,
                "id_main_position" => $employees[$i]->positions[0]->id,
                "main_position" => $employees[$i]->positions[0]->position_name,
                "company_main" => $employees[$i]->positions[0]->company[0]->company_name,
                "directorate_main" => $employees[$i]->positions[0]->directorate[0]->directorat_name,
                "division_main" => $employees[$i]->positions[0]->division[0]->division_name,
                "section_main" => $employees[$i]->positions[0]->section[0]->section_name,
                "job_grade_main" => $employees[$i]->positions[0]->job_grade[0]->grade_name,
                "created_at" =>  $employees[$i]->created_at,
                "updated_at" =>  $employees[$i]->updated_at,
                "additional_position" => $dataPosition,

            ];

            $dataEmployee[] = $employee;
        }


        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Karyawan baru berhasil diambil',
            'data' => $dataEmployee,
        ], 200);
    }

    public function store(Request $request)
    {

        if ($request->filled('id_additional_position')) {
            $validation = $request->validate([
                'nip' => ['required', 'unique:employees,nip,NULL,id,deleted_at,NULL', 'string'],
                'fullname' => ['required', 'string'],
                'nickname' => ['required', 'string', 'unique:employees,nickname,NULL,id,deleted_at,NULL'],
                'hire_date' => ['required', 'date'],
                'company_email' => ['required', 'email', 'unique:employees,company_email,NULL,id,deleted_at,NULL'],
                'id_main_position' => ['required', 'exists:positions,id,deleted_at,NULL'],
                'id_additional_position' => ['array', 'unique_array:id_main_position', 'exists:positions,id,deleted_at,NULL'],
            ]);
        } else {
            $validation = $request->validate([
                'nip' => ['required', 'unique:employees,nip,NULL,id,deleted_at,NULL', 'string'],
                'fullname' => ['required', 'string'],
                'nickname' => ['required', 'string', 'unique:employees,nickname,NULL,id,deleted_at,NULL'],
                'hire_date' => ['required', 'date'],
                'company_email' => ['required', 'email', 'unique:employees,company_email,NULL,id,deleted_at,NULL'],
                'id_main_position' => ['required', 'exists:positions,id,deleted_at,NULL'],
            ]);
        }


        DB::beginTransaction();

        try {

            $employee = Employee::create([
                'nip' => $request->nip,
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'hire_date' => $request->hire_date,
                'company_email' => $request->company_email,
            ]);

            EmployeeDetail::create([
                'employee_id' => $employee->id,
                'position_id' => $request->id_main_position,
                'status' => 1,
            ]);


            $additional_positions = $request->id_additional_position;
            if ($request->filled('id_additional_position')) {
                foreach ($additional_positions as $position) {
                    EmployeeDetail::create([
                        'employee_id' => $employee->id,
                        'position_id' => $position,
                        'status' => 0,
                    ]);
                }
            }

            DB::commit();

            // return response()->json(['message' => 'Data berhasil disimpan']);
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil ditambahkan',
                'data' => $employee,
            ], 200);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Gagal Menyimpan',
            ], 500);
        }
    }

    // Done
    public function show(string $id)
    {
        try {
            

            $employees = Employee::with([
                'positions' => function ($query) {
                    $query->withTrashed()
                          ->orderBy('status', 'desc'); // Menambahkan ORDER BY status secara descending pada tabel pivot
                },
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
                'data' => $employee,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {

        if ($request->filled('id_additional_position')) {
            $validation = $request->validate([
                'nip' => ['required', 'string', 'unique:employees,nip,' . $id . ',id,deleted_at,NULL'],
                'fullname' => ['required', 'string'],
                'nickname' => ['required', 'string', 'unique:employees,nickname,' . $id . ',id,deleted_at,NULL'],
                'hire_date' => ['required', 'date'],
                'company_email' => ['required', 'email', 'unique:employees,company_email,' . $id . ',id,deleted_at,NULL'],
                'id_main_position' => ['required', 'exists:positions,id,deleted_at,NULL'],
                'id_additional_position' => ['array', 'unique_array:id_main_position', 'exists:positions,id,deleted_at,NULL'],
            ]);
        } else {
            $validation = $request->validate([
                'nip' => ['required', 'string', 'unique:employees,nip,' . $id . ',id,deleted_at,NULL'],
                'fullname' => ['required', 'string'],
                'nickname' => ['required', 'string', 'unique:employees,nickname,' . $id . ',id,deleted_at,NULL'],
                'hire_date' => ['required', 'date'],
                'company_email' => ['required', 'email', 'unique:employees,company_email,' . $id . ',id,deleted_at,NULL'],
                'id_main_position' => ['required', 'exists:positions,id,deleted_at,NULL'],
            ]);
        }

        $employee = Employee::findOrFail($id);

        $employee->update([
            'nip' => $request->nip,
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'hire_date' => $request->hire_date,
            'company_email' => $request->company_email,
        ]);

        EmployeeDetail::where('employee_id', $id)->where('status',  1)->update([
            'position_id' => $request->id_main_position,
            'status' => 1,
        ]);

        EmployeeDetail::where('employee_id', $id)->where('status',  0)->delete();

        $additional_positions = $request->id_additional_position;
        // if($request->filled('id_additional_position')) {
        foreach ($additional_positions as $position) {
            EmployeeDetail::create([
                'employee_id' => $id,
                'position_id' => $position,
                'status' => 0,
            ]);
        }
        // }

        DB::commit();

        $employees = Employee::with('positions')->withTrashed()->where('id', $id)->get();

        $employee = [
            "id" => $employees[0]->id,
            "nip" => $employees[0]->nip,
            "fullname" => $employees[0]->fullname,
            "nickname" => $employees[0]->nickname,
            "hire_date" => $employees[0]->hire_date,
            "company_email" => $employees[0]->company_email,
            "id_main_position" => $employees[0]->positions[0]->id,
            "main_position" => $employees[0]->positions[0]->position_name,
        ];

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Karyawan baru berhasil diubah',
            'data' => $employee,
        ], 200);
    }

    // Done
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            EmployeeDetail::where('employee_id', $id)->delete();

            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan berhasil dihapus',
                'data' => $employee,
            ], 200);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Gagal Menghapus',
            ], 500);
        }
    }
}

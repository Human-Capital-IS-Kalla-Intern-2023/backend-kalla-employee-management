<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request) {

        // $primaryEmployee = Employee::find($request)->positions()->where('primary', true)->first();

        $search = $request->get('search');

        $employee = EmployeeDetail::query()->when($search, function($query) use($search){
            $query->where('fullname', 'LIKE', "%".$search."%");
        })->with('position')->get();

        // $employee = Employee::all();

        // return response()->json(['message' => 'Data berhasil disimpan']);
        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Karyawan baru berhasil diambil',
            'data' => $employee,
        ], 200);

    }

    public function store(Request $request) {

        if($request->filled('second_position')) {
            $validation = $request->validate([
                'nip' => ['required','unique:employees,nip,NULL,id,deleted_at,NULL','string'],
                'fullname' => ['required','string'],
                'nickname' => ['required','string','unique:employees,nickname,NULL,id,deleted_at,NULL'],
                'hire_date' => ['required','date'],
                'company_email' => ['required','email','unique:employees,company_email,NULL,id,deleted_at,NULL'],
                'main_position' => ['required','exists:positions,id,deleted_at,NULL'],
                'second_position' => ['exists:positions,id,deleted_at,NULL'],
            ]);
        } else {
            $validation = $request->validate([
                'nip' => ['required','unique:employees,nip,NULL,id,deleted_at,NULL','string'],
                'fullname' => ['required','string'],
                'nickname' => ['required','string','unique:employees,nickname,NULL,id,deleted_at,NULL'],
                'hire_date' => ['required','date'],
                'company_email' => ['required','email','unique:employees,company_email,NULL,id,deleted_at,NULL'],
                'main_position' => ['required','exists:positions,id,deleted_at,NULL'],
            ]);
        }
        
        
        DB::beginTransaction();

        try{

            $employee = Employee::create([
                'nip' => $request->nip,
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'hire_date' => $request->hire_date,
                'company_email' => $request->company_email,
            ]);

            EmployeeDetail::create([
                'employee_id' => $employee->id ,
                'position_id' => $request->main_position,
                'status' => 1,
            ]);

            if($request->filled('second_position')) {
                EmployeeDetail::create([
                    'employee_id' => $employee->id ,
                    'position_id' => $request->second_position,
                    'status' => 0,
                ]);
            }

            DB::commit();

            // return response()->json(['message' => 'Data berhasil disimpan']);
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil ditambahkan',
                'data' => $employee,
            ], 200);
        } catch(\Exception $e){

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
            $employees = EmployeeDetail::with('employee','position')->withTrashed()->where('employee_id',$id)->get();
            
            if($employees->count() > 1  ) {
                $employee = [
                    "nip" => $employees[0]->employee[0]->nip,
                    "fullname" => $employees[0]->employee[0]->fullname,
                    "nickname" => $employees[0]->employee[0]->nickname,
                    "hire_date" => $employees[0]->employee[0]->hire_date,
                    "company_email" => $employees[0]->employee[0]->company_email,
                    "main_position" => $employees[0]->position[0]->position_name,
                    "second_position" => $employees[1]->position[0]->position_name,
                ];
            } else {
                $employee = [
                    "nip" => $employees[0]->employee[0]->nip,
                    "fullname" => $employees[0]->employee[0]->fullname,
                    "nickname" => $employees[0]->employee[0]->nickname,
                    "hire_date" => $employees[0]->employee[0]->hire_date,
                    "company_email" => $employees[0]->employee[0]->company_email,
                    "main_position" => $employees[0]->position[0]->position_name,
                    "second_position" => '',
                ];
            }
            
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
            ]);
        }
    }

    public function update(Request $request, $id) {
        return $request->second_position;

        // if($request->has('second_position') OR $request->second_position == "") {
        //     $validation = $request->validate([
        //         'nip' => ['required','unique:employees,nip,'.$id.',id,deleted_at,NULL','string'],
        //         'fullname' => ['required','string'],
        //         'nickname' => ['required','string','unique:employees,nickname,'.$id.',id,deleted_at,NULL'],
        //         'hire_date' => ['required','date'],
        //         'company_email' => ['required','email','unique:employees,company_email,'.$id.',id,deleted_at,NULL'],
        //         'main_position' => ['required','exists:positions,id,deleted_at,NULL'],
        //         'second_position' => ['exists:positions,id,deleted_at,NULL'],
        //     ]);
        // } else {
        //     $validation = $request->validate([
        //         'nip' => ['required','unique:employees,nip,'.$id.',id,deleted_at,NULL','string'],
        //         'fullname' => ['required','string'],
        //         'nickname' => ['required','string','unique:employees,nickname,'.$id.',id,deleted_at,NULL'],
        //         'hire_date' => ['required','date'],
        //         'company_email' => ['required','email','unique:employees,company_email,'.$id.',id,deleted_at,NULL'],
        //         'main_position' => ['required','exists:positions,id,deleted_at,NULL'],
        //     ]);
        // }
        
        
        DB::beginTransaction();

        try{
            $item = Employee::findOrFail($id);
            

            $employee = Employee::create([
                'nip' => $request->nip,
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'hire_date' => $request->hire_date,
                'company_email' => $request->company_email,
            ]);

            EmployeeDetail::create([
                'employee_id' => $employee->id ,
                'position_id' => $request->main_position,
                'status' => 1,
            ]);

            if($request->has('second_position')) {
                EmployeeDetail::create([
                    'employee_id' => $employee->id ,
                    'position_id' => $request->second_position,
                    'status' => 0,
                ]);
            }

            DB::commit();

            // return response()->json(['message' => 'Data berhasil disimpan']);
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil ditambahkan',
                'data' => $employee,
            ], 200);
        }catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Gagal Menyimpan',
            ], 500);

        }
        
    }

    // Done
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            EmployeeDetail::where('employee_id',$id)->delete();

            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan berhasil dihapus',
                'data' => $employee,
            ]);
            

        } catch(\Exception $e){

            DB::rollback();

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Gagal Menghapus',
            ], 500);

        }
        

    }
}

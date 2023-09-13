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

        $validation = $request->validate([
            'nip' => ['required','unique:employees,nip,NULL,id,deleted_at,NULL','string'],
            'fullname' => ['required','string'],
            'nickname' => ['required','string','unique:employees,nickname,NULL,id,deleted_at,NULL'],
            'hire_date' => ['required','date'],
            'company_email' => ['required','email','unique:employees,company_email,NULL,id,deleted_at,NULL'],
            'main_position' => ['required','exists:positions,id,deleted_at,NULL'],
            'second_position' => ['exists:positions,id,deleted_at,NULL'],
        ]);
        
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

    public function show(string $id)
    {
        try {
        
            $employee = EmployeeDetail::with(['position' => function ($query) {
                $query->withTrashed(); // Mengambil data yang terhapus secara lembut (soft deleted)
            }])->where('employee_id',$id)->get();

            // return response()->json(['message' => 'Data berhasil disimpan']);
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Karyawan baru berhasil diambil',
                'data' => $employee,
            ], 200);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }

    public function update(Request $request, $id) {
        try {

            //define validation rules
            $validator = Validator::make($request->all(), [
                'location_name'     => 'required|string',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }
    
            $item = Employee::findOrFail($id);
            
            $item->update([
                'nip' => $request->nip,
            ]);
    
            return ResponseFormatter::success(
                $item,
                'Data Berhasil Diubah'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
        
    }

    public function destroy(string $id)
    {

    $employee = Employee::findOrFail($id);
    // $employeeDetail = EmployeeDetail::fin
    //delete post
    $employee->delete();

    return response()->json([
        'status_code' => 200,
        'status' => 'success',
        'message' => 'Karyawan berhasil dihapus',
        'data' => $employee,
    ]);

    }
}

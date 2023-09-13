<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        // $pEmployee = Employee::findOrFail('nip')->positions()->where('primary', true)->first();

        $search = $request->get('search');

        $employee = Employee::query()->when($search, function($query) use($search){
            $query->where('fullname', 'LIKE', "%".$search."%");
        })->with('position')->get();

        return ResponseFormatter::success([
            'employee' => $employee,
            // 'primaryPosition' => $pEmployee,
        ],
        'Data Employee berhasil diambil'
        );

    }

    public function store(Request $request) {
        // try {
        //     //define validation rules
        //     $validator = Validator::make($request->all(), [
        //         'nip' => 'required|string',
        //         'fullname' => 'required|string',
        //         'nickname' => 'required|string',
        //         'hire_date' => 'required|date',
        //         'company_email' => 'required|email',
        //     ]);

        //      //check if validation fails
        //     if ($validator->fails()) {
        //         return ResponseFormatter::error([
        //             'message' => 'Validation Error',
        //             'error' => $validator->errors(),
        //         ], 'Validation Error', 422);
        //     }


        //     $data = Employee::create([
        //         'nip' => $request->nip,
        //     ]);


        //     return ResponseFormatter::success(
        //         $data,
        //         'Data Berhasil Ditambahkan'
        //     );

        // } catch (Exception $error) {
        //     return ResponseFormatter::error([
        //                 'message' => 'Something went wrong',
        //                 'error' => $error,
        //     ], 'Error', 500);
        // }

        $validation = $request->validate([
            'nip' => ['required','string'],
            'fullname' => ['required','string'],
            'nickname' => ['required','string'],
            'hire_date' => ['required','date'],
            'company email' => ['required','email'],
            'position' => ['required','string'],
        ]);
        

        Employee::create([
            'division_name' => $validation['division_name'],
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);

    }

    public function show(string $id)
    {
        try {

            $employee = Employee::findOrFail($id);
    
            return ResponseFormatter::success(
                $employee,
                'Data berhasil diambil'
            );
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
        try {
            

            $employee = Employee::findOrFail($id);

            //delete post
            $employee->delete();

            return ResponseFormatter::success(
                'Data Berhasil Dihapus'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }
}

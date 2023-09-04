<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        $employee =  Employee::all();

        return ResponseFormatter::success(
            $employee,
            'Data Perusahaan berhasil diambil'
        );
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
    public function store(Request $request) {
        try {
            $request->validate([
                'fullname' => ['required','string','max:255'],
                'nickname' => ['required','string','max:255'],
                'hire_date' => ['required','date_format:d-m-Y'],
                'company_email' => ['required', 'email', 'max:255'],
                'main_position' => ['required', 'string', 'max:255'],
                'secondary_position' => ['required', 'string', 'max:255'],
            ]);

            $employee = Employee::create([
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'hire_date' => $request->hire_date,
                'company_email' => $request->company_email,
                'main_position' => $request->main_position,
                'secondary_position' => $request->secondary_position,
            ]);


            return ResponseFormatter::success(
                $employee,
                'Data Berhasil Dtambahkan'
            );

        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }

    /**
     * Display the specified resource.
     */
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


    public function update(Request $request, string $id) { 
        // 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        // 
    }
}

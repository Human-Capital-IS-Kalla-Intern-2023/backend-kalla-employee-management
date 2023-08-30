<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Division;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;
use Exception;
use Illuminate\Contracts\View\View;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        $id = $request->input('id');
        $location_name = $request->input('employee_id');

        if($id) {
            $employee = Employee::find($id);

            if($employee)
            {
                return ResponseFormatter::success(
                    $employee,
                    'Data Employee berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data Employee tidak ada',
                    404
                );
            };
        }

        $employee = Employee::all();


        return ResponseFormatter::success(
            $employee,
            'Data Employee berhasil diambil'
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
            ]);

            $data = Employee::create([
                'fullname' => $request->fullname,
            ]);


            return ResponseFormatter::success(
                $data,
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
        $data = Division::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id) {
        try {
            $data = $request->validate([
                'fullname' => ['required','string','max:255'],
            ]);
    
            $item = Employee::findOrFail($id);
    
            $item->update($data);
    
            return ResponseFormatter::success(
                $data,
                'Data Berhasil Diubah'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Employee::findOrFail($id);
        $post->delete();
    }
}

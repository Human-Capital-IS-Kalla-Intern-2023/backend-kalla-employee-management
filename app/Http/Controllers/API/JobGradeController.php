<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\JobGrade;
use Exception;
use Illuminate\Http\Request;

class JobGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $id = $request->input('id');

        if($id) {
            $jobGrade = JobGrade::find($id);

            if($jobGrade)
            {
                return ResponseFormatter::success(
                    $jobGrade,
                    'Data berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data tidak ada',
                    404
                );
            };
        }

        $jobGrade = JobGrade::all();


        return ResponseFormatter::success(
            $jobGrade,
            'Data  berhasil diambil'
        );

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $request->validate([
                'salary' => ['required','string','max:255'],
            ]);

            $data = JobGrade::create([
                'salary' => $request->salary,
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
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id) {
        try {
            $data = $request->validate([
                'salary' => ['required','string','max:255'],
            ]);
    
            $item = JobGrade::findOrFail($id);
    
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
}

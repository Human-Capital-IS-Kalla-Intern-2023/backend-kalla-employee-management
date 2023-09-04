<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\JobGrade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JobGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {

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

            //define validation rules
            $validator = Validator::make($request->all(), [
                'salary'     => 'required|integer',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }

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

    public function show(string $id)
    {
        try {

            $jobGrade = JobGrade::findOrFail($id);
    
            return ResponseFormatter::success(
                $jobGrade,
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
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id) {
        try {
            //define validation rules
            $validator = Validator::make($request->all(), [
                'salary'     => 'required|integer',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }
            

            $item = JobGrade::findOrFail($id);

            $item->update([
                'salary' => $request->salary,
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
            $jobGrade = JobGrade::findOrFail($id);

            //delete post
            $jobGrade->delete();

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

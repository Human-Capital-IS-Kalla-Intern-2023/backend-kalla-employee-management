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

        $search = $request->get('search'); 

        $jobGrade = JobGrade::query()->when($search, function($query) use($search) {
            $query->where('grade_name','like','%'.$search.'%');
        })->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Job Grade berhasil diambil',
            'data' => $jobGrade,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $validation = $this->validate($request, [
            'grade_name'     => 'required|string|unique:job_grades,grade_name,NULL,id,deleted_at,NULL|max:255',
        ]);

            // //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'grade_name'     => 'required|string|unique:job_grades,grade_name,NULL,id,deleted_at,NULL|max:255',
            // ]);

            //  //check if validation fails
            // if ($validator->fails()) {
            //     return response()->json([
            //         'status_code' => 400,
            //         'status' => 'error',
            //         'message' => $validator->errors(),
            //     ]);
            // }

            $data = JobGrade::create([
                'grade_name' => $request->grade_name,
            ]);


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Grade berhasil ditambahkan',
                'data' => $data,
            ]);
    }

    public function show(string $id)
    {
        try {

            $jobGrade = JobGrade::findOrFail($id);
            
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Grade berhasil diambil',
                'data' => $jobGrade,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id) {

        try {
            $item = JobGrade::findOrFail($id);

            $validation = $this->validate($request, [
                'grade_name'     => 'required|string|unique:job_grades,grade_name,NULL,id,deleted_at,NULL|max:255',
            ]);

            //define validation rules
            $validator = Validator::make($request->all(), [
                'grade_name'     => 'required|string|unique:job_grades,grade_name,NULL,id,deleted_at,NULL|max:255',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status_code' => 400,
                    'status' => 'error',
                    'message' => $validator->errors(),
                ]);
            }

            $item->update([
                'grade_name' => $request->grade_name,
            ]);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Grade berhasil diubah',
                'data' => $item,
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ]);
        }
        
    }

    public function destroy(string $id)
    {
        try {
            $jobGrade = JobGrade::findOrFail($id);

            //delete post
            $jobGrade->delete();


            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Grade berhasil dihapus',
                'data' => $jobGrade,
            ]);

        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500,
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Grade masih digunakan tabel lain',
                ]);
            }

            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ]);

        }

    }

}

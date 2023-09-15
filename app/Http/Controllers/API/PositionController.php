<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    public function index(Request $request) {  
        $search = $request->get('search');

        $positions = Position::query()->when($search, function($query) use($search){
            $query->where('position_name', 'LIKE', "%".$search."%");
        })->with([
            'company',
            'job_grade',
            'directorate',
            'division',
            'section',
        ])->withTrashed()->get();

        $dataPosision = [];

        for($i = 0; $i < $positions->count(); $i++) {
            $position = [
                "id" => $positions[$i]->id,
                "position_name" => $positions[$i]->position_name,
                "company_name" => $positions[$i]->company[0]->company_name,
                "directorat_name" => $positions[$i]->directorate[0]->directorat_name,
                "division_name" => $positions[$i]->division[0]->division_name,
                "section_name" => $positions[$i]->section[0]->section_name,
                "grade_name" => $positions[$i]->job_grade[0]->grade_name,
            ];

            $dataPosition[] = $position;
        }

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Posisi berhasil diambil',
            'data' => $dataPosition,
        ], 200);

    }

    public function store(Request $request) {

        $validation = $request->validate([
            'position_name' => ['required','unique:positions,position_name,NULL,id,deleted_at,NULL','string'],
        ]);
        

        $data = Position::create([
            'position_name' => $request->position_name,
            'company_id' => $request->company_id,   
            'job_grade' => $request->job_grade,   
            'directorate' => $request->directorate,   
            'division' => $request->division,   
            'section' => $request->section,   
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Posisi berhasil ditambahkan',
            'data' => $data,
        ], 200);
    }

    public function show(string $id)
    {
        try {

            $positions = Position::with([
                'company',
                'job_grade',
                'directorate',
                'division',
                'section',
            ])->withTrashed()->where('id',$id)->get();

            $position = [
                "id" => $positions[0]->id,
                "position_name" => $positions[0]->position_name,
                "company_name" => $positions[0]->company[0]->company_name,
                "directorat_name" => $positions[0]->directorate[0]->directorat_name,
                "division_name" => $positions[0]->division[0]->division_name,
                "section_name" => $positions[0]->section[0]->section_name,
                "grade_name" => $positions[0]->job_grade[0]->grade_name,
            ];

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Posisi berhasil diambil',
                'data' => $position,
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 500);
        }
    }

    public function update(Request $request, $id) {
        $validation = $this->validate($request, [
            'position_name' => 'required|string|unique:positions,position_name,NULL,id,deleted_at,NULL|max:255'
        ]);
        
        try {

            // //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'position_name'     => 'required|string',
            // ]);

            //  //check if validation fails
            // if ($validator->fails()) {
            //     return ResponseFormatter::error([
            //         'message' => 'Validation Error',
            //         'error' => $validator->errors(),
            //     ], 'Validation Error', 422);
            // }
    
            $item = Position::findOrFail($id);
            
            $item->update([
                'position_name' => $request->position_name,
            ]);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Posisi berhasil diubah',
                'data' => $item,
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 500);
        }
        
    }

    public function destroy(string $id)
    {
        try {
            

            $position = Position::findOrFail($id);

            //delete post
            $position->delete();

            return response()->json([
                'status_code' => 200, 
                'status' => 'success',
                'message' => 'Posisi berhasil dihapus',
                'data' => $position,
            ], 200);

        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500, 
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Posisi masih digunakan tabel lain',
                ], 500);
            }

            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data Tidak ditemukan',
            ], 404);
        }
    }
}

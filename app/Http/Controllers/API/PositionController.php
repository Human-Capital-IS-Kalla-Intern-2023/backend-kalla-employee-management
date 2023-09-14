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

        $position = Position::query()->when($search, function($query) use($search){
            $query->where('position_name', 'LIKE', "%".$search."%");
        })->with([
            'company',
            'job_grade',
            'directorate',
            'division',
            'section',
        ])->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Posisi baru berhasil ditampilkan',
            'data' => $position,
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
            'message' => 'Data berhasil disimpan',
            'data' => $data,
        ], 200);
    }

    public function show(string $id)
    {
        try {

            $position = Position::with(['postition' => function ($query){
                $query->withTrash();
            }])->where('position_name', $id)->get();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Posisi baru berhasil diambil',
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
                'message' => 'ID Tidak ditemukan',
            ], 404);
        }
    }
}

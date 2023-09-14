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
            'message' => 'Data berhasil disimpan',
            'data' => $data,
        ]);
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
                'position_name'     => 'required|string',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }
    
            $item = Position::findOrFail($id);
            
            $item->update([
                'position_name' => $request->position_name,
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
            

            $position = Position::findOrFail($id);

            //delete post
            $position->delete();

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

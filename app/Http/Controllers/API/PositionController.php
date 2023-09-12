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
        })->with('primary')->get();

        return ResponseFormatter::success(
            $position,
            'Data Position berhasil diambil'
        );

    }

    public function store(Request $request) {
        // try {
        //     //define validation rules
        //     $validator = Validator::make($request->all(), [
        //         'position_name'     => 'required|string',
        //     ]);

        //      //check if validation fails
        //     if ($validator->fails()) {
        //         return ResponseFormatter::error([
        //             'message' => 'Validation Error',
        //             'error' => $validator->errors(),
        //         ], 'Validation Error', 422);
        //     }


        //     $data = Position::create([
        //         'position_name' => $request->position_name,
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
            'position_name' => ['required','string']
        ]);
        

        Position::create([
            'position_name' => $validation['position_name'],
        ]);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function show(string $id)
    {
        try {

            $position = Position::findOrFail($id);
    
            return ResponseFormatter::success(
                $position,
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

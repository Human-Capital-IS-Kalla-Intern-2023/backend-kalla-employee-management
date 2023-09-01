<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Position;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\View\View;

class PositionController extends Controller
{
    public function index(Request $request) {
        $id = $request->input('id');
        $location_name = $request->input('id');

        if($id) {
            $position = Position::find($id);

            if($position)
            {
                return ResponseFormatter::success(
                    $position,
                    'Data Position berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data Position tidak ada',
                    404
                );
            };
        }

        $position = Position::all();


        return ResponseFormatter::success(
            $position,
            'Data Position berhasil diambil'
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

            $data = Position::create([
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
        try {

            $position = Position::findOrFail($id);
            // return response()->json($position);
    
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
        try {
            $data = $request->validate([
                'fullname' => ['required','string','max:255'],
            ]);
    
            $item = Position::findOrFail($id);
    
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
        $position = Position::findOrFail($id);
        
        $position->delete();
        
        $position = Position::all();

        return ResponseFormatter::success(
            "Data berhasil dihapus"
        );
    }
}

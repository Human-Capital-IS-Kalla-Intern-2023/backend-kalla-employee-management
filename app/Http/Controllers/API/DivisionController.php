<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Division;
use Illuminate\Http\Request;
use Exception;

class DivisionController extends Controller
{
    public function index(Request $request) {
        $id = $request->input('id');

        if($id) {
            $division = Division::find($id);

            if($division)
            {
                return ResponseFormatter::success(
                    $division,
                    'Data Divisi berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data Divisi tidak ada',
                    404
                );
            };
        }

        $division = Division::all();


        return ResponseFormatter::success(
            $division,
            'Data Division berhasil diambil'
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
                'division_name' => ['required','string','max:255'],
            ]);

            $data = Division::create([
                'division_name' => $request->division_name,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $data = Division::find($id);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id) {
        try {
            $data = $request->validate([
                'division_name' => ['required','string','max:255'],
            ]);
    
            $item = Division::findOrFail($id);
    
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
        $post = Division::findOrFail($id);
        $post->delete();
    }
}

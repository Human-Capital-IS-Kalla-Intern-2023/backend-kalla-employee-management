<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Section;
use Illuminate\Http\Request;
use Exception;


class SectionController extends Controller
{
    public function index(Request $request) {
        $id = $request->input('id');
        $location_name = $request->input('id');

        if($id) {
            $section = Section::find($id);

            if($section)
            {
                return ResponseFormatter::success(
                    $section,
                    'Data Section berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data Section tidak ada',
                    404
                );
            };
        }

        $section = Section::all();


        return ResponseFormatter::success(
            $section,
            'Data Section berhasil diambil'
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
                'section_name' => ['required','string','max:255'],
            ]);

            $data = Section::create([
                'section_name' => $request->section_name,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id) {
        try {
            $data = $request->validate([
                'section_name' => ['required','string','max:255'],
            ]);
    
            $item = Section::findOrFail($id);
    
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
        $post = Section::findOrFail($id);
        $post->delete();
        
    }
}

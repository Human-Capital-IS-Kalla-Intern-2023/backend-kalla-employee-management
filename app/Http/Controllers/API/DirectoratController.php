<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Directorat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DirectoratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        

        $location = Directorat::all();


        return ResponseFormatter::success(
            $location,
            'Data Directorat berhasil diambil'
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
            //define validation rules
            $validator = Validator::make($request->all(), [
                'directorat_name'     => 'required|string|unique:directorats,directorat_name|max:255',
            ]);

             //check if validation fails
            if ($validator->fails()) {
                $errors  = $validator->errors()->first();

                return ResponseFormatter::error('', $errors, 400);
            }

            $data = Directorat::create([
                'directorat_name' => $request->directorat_name,
            ]);


            return ResponseFormatter::success(
                $data,
                'Data Berhasil Ditambahkan'
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

            $data = Directorat::findOrFail($id);
    
            return ResponseFormatter::success(
                $data,
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
            //define validation rules
            $validator = Validator::make($request->all(), [
                'directorat_name'     => 'required|string|unique:directorats,directorat_name|max:255',
            ]);

            
             //check if validation fails
            if ($validator->fails()) {
                $errors  = $validator->errors()->first();
                // $errors  = $validator->errors();

                return ResponseFormatter::error('', $errors,400);

            }
    
            $item = Directorat::findOrFail($id);
    
            $item->update([
                'directorat_name' => $request->directorat_name,
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        

        try {
            $directorat = Directorat::findOrFail($id);

            //delete post
            $directorat->delete();

            return ResponseFormatter::success('', 'Data Berhasil Dihapus', 200);


        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return ResponseFormatter::error('','Tidak dapat menghapus, Direktorat masih digunakan tabel lain', 500);
            }

            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }
}

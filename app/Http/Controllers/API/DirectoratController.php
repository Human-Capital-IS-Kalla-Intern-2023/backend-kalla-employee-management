<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Directorat;
use Illuminate\Http\Request;

class DirectoratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $id = $request->input('id');

        if($id) {
            $location = Directorat::find($id);

            if($location)
            {
                return ResponseFormatter::success(
                    $location,
                    'Data lokasi berhasil diambil'
                );   
            }  else {
                return ResponseFormatter::error(
                    null,
                    'Data lokasi tidak ada',
                    404
                );
            };
        }

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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

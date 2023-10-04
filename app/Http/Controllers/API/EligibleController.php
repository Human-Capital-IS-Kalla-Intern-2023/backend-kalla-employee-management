<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EligibleController extends Controller
{
    public function store(Request $request) {
        $input = [

            'empl' => 'Demo Title',

            'data' => [

                '1' => 'One',

                '2' => 'Two',

                '3' => 'Three'

            ]

        ];

        $item = Item::create($input);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Karyawan baru berhasil diambil',
            'data' => $employee,
        ], 200);
    }
}

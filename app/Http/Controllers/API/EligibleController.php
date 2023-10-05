<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eligible;
use Illuminate\Http\Request;

class EligibleController extends Controller
{
    public function index(Request $request)
    {
        $salary_detail = [
            'salary_detail' => [
                'salary_id' => '',
                'order' => 'Two',
                'salary_component_id' => 'Three',
                'component_name' => 'Three',
                'type' => 'Three',
                'is_hide' => 'Three',
                'is_edit' => 'Three',
                'is_active' => 'Three'
            ]
        ];

        $item = Eligible::create(
            [
                'salary_detail' => json_encode($salary_detail)
            ]
        );

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Karyawan baru berhasil diambil',
            'data' => $item,
        ], 200);
    }
}

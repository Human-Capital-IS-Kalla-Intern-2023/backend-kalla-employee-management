<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class EmployeeController extends Controller
{
    public function all(Request $request) {
        $id = $request->input('id');
        $location_name = $request->input('employee_id');

        if($id) {
            $data = Employee::all();

            if($data) {
                return ResponseFormatter::success(
                    $data,
                    'Data Berhasil Diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }

        }

        $location = Employee::all();
    }
}

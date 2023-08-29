<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function all(Request $request) {
        $id = $request->input('id');
        $location_name = $request->input('id');

        if($id) {
            $data = Section::all();

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

        $location = Section::all();
    }
}

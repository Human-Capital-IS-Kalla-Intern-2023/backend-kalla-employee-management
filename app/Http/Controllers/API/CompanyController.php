<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request) {

        $company = Company::with('location')->get();


        return ResponseFormatter::success(
            $company,
            'Data Perusahaan berhasil diambil'
        );

       
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'company_name' => ['required','string','max:255'],
                'locations_id' => ['required','exists:locations,id'],
            ]);

            $data = Company::create([
                'company_name' => $request->company_name,
                'locations_id' => $request->locations_id,
            ]);


            return ResponseFormatter::success(
                $data,
                'Data Berhasil Ditambah'
            );

        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }

    public function show(string $id)
    {
        try {

            $company = Company::with('location')->findOrFail($id);
    
            return ResponseFormatter::success(
                $company,
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
            $data = $request->validate([
                'company_name' => ['required','string','max:255'],
                'locations_id' => ['required','exists:locations,id'],
            ]);
    
            $item = Company::findOrFail($id);
    
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

    public function destroy(string $id) {
        $company = Company::findOrFail($id);

        //delete post
        $company->delete();

        return ResponseFormatter::success(
            'Data Berhasil Dihapus'
        );
    }

}

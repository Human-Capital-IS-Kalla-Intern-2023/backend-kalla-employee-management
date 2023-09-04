<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
             //define validation rules
            $validator = Validator::make($request->all(), [
                'company_name' => ['required','string','max:255'],
                'locations_id' => ['required','exists:locations,id'],
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }

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
             //define validation rules
             $validator = Validator::make($request->all(), [
                'company_name' => ['required','string','max:255'],
                'locations_id' => ['required','exists:locations,id'],
            ]);

             //check if validation fails
            if ($validator->fails()) {
                return ResponseFormatter::error([
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 'Validation Error', 422);
            }

            $item = Company::findOrFail($id);
    
            $item->update([
                'company_name' => $request->company_name,
                'locations_id' => $request->locations_id,
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


    public function destroy(string $id)
    {
        try {
            $company = Company::findOrFail($id);

            //delete post
            $company->delete();

            return ResponseFormatter::success(
                'Data Berhasil Dihapus'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                        'message' => 'Something went wrong',
                        'error' => $error,
            ], 'Error', 500);
        }
    }

}

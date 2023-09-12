<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    public function index(Request $request) {

        $search = $request->get('search'); 

        $company = Company::query()->when($search, function($query) use($search) {
            $query->where('company_name','like','%'.$search.'%');
        })->with('location')->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Perusahaan berhasil diambil',
            'data' => $company,
        ]);
    }

    public function store(Request $request) {

        

        // define validation rules
        // $validator = Validator::make($request->all(), [
        //     'company_name' => ['required','string','unique:companies,company_name,NULL,id,deleted_at,NULL','max:255'],
        //     'locations_id' => ['required','exists:locations,id,deleted_at,NULL'],
        // ]);


        //     //check if validation fails
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status_code' => 400,
        //         'status' => 'error',
        //         'message' => $validator->errors(),
        //     ]);
        // }

        $validation = $this->validate($request, [
            'company_name' => ['required','string','unique:companies,company_name,NULL,id,deleted_at,NULL','max:255'],
            'locations_id' => ['required','exists:locations,id,deleted_at,NULL'],
        ]);
        
        $data = Company::create([
            'company_name' => $request->company_name,
            'locations_id' => $request->locations_id,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Perusahaan baru berhasil ditambahkan',
            'data' => $data,
        ]);
    }

    public function show(string $id)
    {
        try {

            $company = Company::with('location')->findOrFail($id);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data Perusahaan berhasil diambil',
                'data' => $company,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $item = Company::findOrFail($id);

            $validation = $this->validate($request, [
                'company_name' => ['required','string','unique:companies,company_name,NULL,id,deleted_at,NULL','max:255'],
                'locations_id' => ['required','exists:locations,id,deleted_at,NULL'],
            ]);


            //  //define validation rules
            // $validator = Validator::make($request->all(), [
            //     'company_name' => ['required','string','unique:companies,company_name,NULL,id,deleted_at,NULL','max:255'],
            //     'locations_id' => ['required','exists:locations,id,deleted_at,NULL'],
            // ]);

            //  //check if validation fails
            // if ($validator->fails()) {
            //     return response()->json([
            //         'status_code' => 400,
            //         'status' => 'error',
            //         'message' => $validator->errors(),
            //     ]);
            // }
    
            $item->update([
                'company_name' => $request->company_name,
                'locations_id' => $request->locations_id,
            ]);
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Perusahaan berhasil diubah',
                'data' => $item,
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ]);
        }
    }


    public function destroy(string $id)
    {
        try {
            $company = Company::findOrFail($id);

            //delete post
            $company->delete();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Perusahaan berhasil dihapus',
                'data' => $company,
            ]);

        } catch (Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500,
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Perusahaan masih digunakan tabel lain',
                ]);
            }

            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ]);

        }
    }

}

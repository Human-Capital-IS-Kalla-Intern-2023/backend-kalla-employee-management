<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Compensation;
use Illuminate\Http\Request;

class CompensationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');


        $compensations = Compensation::query()->when($search, function ($query) use ($search) {
            $query->where('compensation_name', 'like', '%' . $search . '%');
        })->with([
            'company' => function ($query) {
                $query->withTrashed(); // Mengambil data yang terhapus secara lembut (soft deleted)
            },
            'salary' => function ($query) {
                $query->withTrashed(); // Mengambil data yang terhapus secara lembut (soft deleted)
            },
        ])->get();

        // Transformasi data sesuai format yang Anda inginkan
        $transformedCompensations = $compensations->map(function ($compensation) {
            return [
                'id' => $compensation->id,
                'company_id' => $compensation->company->id,
                'company_name' => $compensation->company->company_name,
                'salary_id' => $compensation->salary_,
                'salary_name' => $compensation->salary_name,
                'compensation_name' => $compensation->compensation_name,
                'month' => date('m', strtotime($compensation->period)), // Ambil bulan dari kolom "period"
                'year' => date('Y', strtotime($compensation->period)),   // Ambil tahun dari kolom "period"
                'created_at' => $compensation->created_at,
                'updated_at' => $compensation->updated_at,
            ];
        });


        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Perusahaan berhasil diambil',
            'data' => $transformedCompensations,
        ]);
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

    public function company(string $id)
    {
        $company = Company::where('company_id')->with('salary')->get();
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Compensation;
use App\Models\EmployeeCompensation;
use App\Models\Position;
use App\Models\Salary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'salary_id' => $compensation->salary_id,
                'salary_name' => $compensation->salary->salary_name,
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
            'message' => 'Data Compensation berhasil diambil',
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

        // $validation = $this->validate($request, [
        //     'company_name' => ['required','string','unique:companies,company_name,NULL,id,deleted_at,NULL','max:255'],
        //     'locations_id' => ['required','exists:locations,id,deleted_at,NULL'],
        // ]);

        // Create Compensation
        $compensation = Compensation::create([
            'company_id' => $request->company_id,
            'salary_id' => $request->salary_id,
            'compensation_name' =>  $request->compensation_name,
            'period' => ["month" => $request->month, "year" => $request->year]
        ]);

        // GetData Position
        $data = Position::with(
            'employeeDetails',
            'employeeDetails.position',
            'employeeDetails.employee',
            'employeeDetails.eligible'
        )->where('company_id', 5)->get();


        for ($i = 0; $i < $data->count(); $i++) {
            for ($j = 0; $j < $data[$i]->employeeDetails->count(); $j++) {
                $employee_compensation = EmployeeCompensation::create([
                    'compensations_id' => $compensation->id,
                    'employee' => json_encode($data[$i]->employeeDetails[$j]->employee),
                    'position' => json_encode($data[$i]->employeeDetails[$j]->position),
                    'eligble' => json_encode($data[$i]->employeeDetails[$j]->eligible)

                ]);
            }
        }

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Compensation baru berhasil ditambahkan',
            // 'data' => $employeeDetails,
            'data' => $data,
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // try {
        $compensations = Compensation::with('salary', 'company', 'employeeCompensations')->where('id', $id)->get();

        // Transformasi data sesuai format yang Anda inginkan
        $transformedCompensations = $compensations->map(function ($compensation) {
            return [
                'id' => $compensation->id,
                'company_id' => $compensation->company->id,
                'company_name' => $compensation->company->company_name,
                'salary_id' => $compensation->salary_id,
                'salary_name' => $compensation->salary->salary_name,
                'compensation_name' => $compensation->compensation_name,
                'month' => date('m', strtotime($compensation->period)), // Ambil bulan dari kolom "period"
                'year' => date('Y', strtotime($compensation->period)),   // Ambil tahun dari kolom "period"
                'employee_compensations' => $compensation->employeeCompensations,
                'created_at' => $compensation->created_at,
                'updated_at' => $compensation->updated_at,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Compensation berhasil diambil',
            'data' => $transformedCompensations,
        ]);
        // } catch (Exception $error) {
        //     return response()->json([
        //         'status_code' => 404,
        //         'status' => 'error',
        //         'message' => 'Data tidak ditemukan',
        //     ], 404);
        // }
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
        $validation = $request->validate([
            'company_id' => ['required'],
            'salary_id' => ['required'],
            'compensation_name' => ['required'],
            'year' => ['required'],
            'month' => ['required'],
            // 'period' => ['required'],
        ]);

        try {
            $year = $request->input('year');
            $month = $request->input('month');

            $compensation = Compensation::where('id', $id)->first();

            // $compensation->update([
            //     'company_id' => $request->input('company_id'),
            //     'salary_id' => $request->input('salary_id'),
            //     'compensation_name' => $request->input('compensation_name'),
            //     'period' => "$year-$month-01",
            // ]);

            $compensation->company_id = $request->input('company_id');
            $compensation->salary_id = $request->input('salary_id');
            $compensation->compensation_name = $request->input('compensation_name');
            $compensation->year = $year;
            $compensation->month = $month;

            // $compensation->period = "$year-$month-01";

            $compensation->save();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data Compensation berhasil diubah',
                'data' => $compensation,
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::transaction(function () use ($id) {
                // Hapus data dari tabel 'compensation'
                Compensation::where('id', $id)->delete();

                // Hapus data dari tabel 'employe_compensation' terlebih dahulu
                // EmployeCompensation::where('compensation_id', 1)->delete();
            }, 5);
        } catch (\Exception $error) {
            // if ($error->getCode() == '23000') {
            //     return response()->json([
            //         'status_code' => 500,
            //         'status' => 'error',
            //         'message' => 'Tidak dapat menghapus, Perusahaan masih digunakan tabel lain',
            //     ]);
            // }

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan' . $error->getMessage(),
            ], 500);
        }
    }

    public function company(string $id)
    {
        $company = Company::where('id', $id)
            ->with('salary')
            ->withTrashed()
            ->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Gaji Company berhasil diambil',
            'data' => $company,
        ]);
    }
}

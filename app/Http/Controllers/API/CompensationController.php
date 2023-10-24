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

use function Ramsey\Uuid\v1;

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

        $validation = $this->validate($request, [
            'company_id' => ['required','exists:companies,id'],
            'salary_id' => ['required','exists:salaries,id'],
            'compensation_name' =>  ['required','string','unique:compensations,compensation_name','max:255'],
            'month' => ['required','integer','min:1','max:12'],
            'year' => ['required','integer','min:1900','max:'.date('Y')],
        ]);

        try {
            $salary = Salary::findOrFail($request->salary_id);

            // Create Compensation
            $compensation = Compensation::create([  
                'company_id' => $request->company_id,
                'salary' => json_encode($salary),
                'compensation_name' =>  $request->compensation_name,
                'period' => ["month" => $request->month, "year" => $request->year]
            ]);

            // GetData Position
            $data = Position::with(
                    'employeeDetails',
                    'employeeDetails.position',
                    'employeeDetails.position.company',
                    'employeeDetails.position.directorate',
                    'employeeDetails.position.division',
                    'employeeDetails.position.section',
                    'employeeDetails.position.job_grade',
                    'employeeDetails.employee',
                    'employeeDetails.eligible'
                )->where('company_id', $request->company_id)->get();

            
            for ($i=0; $i < $data->count() ; $i++) { 
                for ($j=0; $j < $data[$i]->employeeDetails->count(); $j++) { 
                    if($data[$i]->employeeDetails[$j]->eligible != null) {
                        //  Transformasi data sesuai format yang Anda inginkan
                            $descPosition =  [
                                "id" => $data[$i]->employeeDetails[$j]->position->id,
                                "position_name" => $data[$i]->employeeDetails[$j]->position->position_name,
                                "company_id" => $data[$i]->employeeDetails[$j]->position->company_id,
                                "company_name" => $data[$i]->employeeDetails[$j]->position->company[0]->company_name,
                                "directorat_id" => $data[$i]->employeeDetails[$j]->position->directorat_id,
                                "directorat_name" => $data[$i]->employeeDetails[$j]->position->directorate[0]->directorat_name,
                                "division_id" => $data[$i]->employeeDetails[$j]->position->division_id,
                                "division_name" => $data[$i]->employeeDetails[$j]->position->division[0]->division_name,
                                "section_id" => $data[$i]->employeeDetails[$j]->position->section_id,
                                "section_name" => $data[$i]->employeeDetails[$j]->position->section[0]->section_name,
                                "job_grade_id" => $data[$i]->employeeDetails[$j]->position->job_grade_id,
                                "grade_name" => $data[$i]->employeeDetails[$j]->position->job_grade[0]->grade_name,
                                "created_at" => $data[$i]->employeeDetails[$j]->position->created_at,
                                "updated_at" => $data[$i]->employeeDetails[$j]->position->updated_at,

                            ];
                            $employee_compensation = EmployeeCompensation::create([
                                'compensations_id' => $compensation->id,
                                'employee' => json_encode($data[$i]->employeeDetails[$j]->employee),
                                'position' => json_encode($descPosition),
                                'eligible' => json_encode($data[$i]->employeeDetails[$j]->eligible)
                            ]);

                    }
                }

            }
        
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Compensation baru berhasil ditambahkan',
                'data' => $compensation,
            ], 200);
        } catch(Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan',
            ], 500);
        }

        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

            $compensations = Compensation::with('company','employeeCompensations')->where('id',$id)->get();

            if($compensations->count() <= 0 ) {
                return response()->json([
                    'status_code' => 404,
                    'status' => 'error',
                    'message' => 'Data tidak ditemukan',
                ], 404);
            } else {
                // Transformasi data sesuai format yang Anda inginkan
            
                $transformedCompensations = $compensations->map(function ($compensation) {
                    // Inisialisasi array untuk menyimpan data yang diperlukan
                    $employeeData = [];

                    // Loop melalui data karyawan
                    foreach ($compensation->employeeCompensations as $employee) {
                        $employeeInfo = json_decode($employee['employee'], true);
                        $positionInfo = json_decode($employee['position'], true);

                        // Mengambil data yang diperlukan
                        $idEmployeeCompensation = $employee->id;
                        $idCompensations =  $employee->compensations_id;
                        $idEmployee = $employeeInfo['id'];
                        $nip = $employeeInfo['nip'];
                        $fullname = $employeeInfo['fullname'];
                        $idPosition = $positionInfo['id'];
                        $positionName = $positionInfo['position_name'];

                        // Menambahkan data ke array employeeData
                        $employeeData[] = [
                            'employee_compensation_id' => $idEmployeeCompensation,
                            'compensations_id' => $idCompensations,
                            'employee_id' => $idEmployee,
                            'nip' => $nip,
                            'fullname' => $fullname,
                            'id_position' => $idPosition,
                            'position_name' => $positionName,
                        ];
                    }

                    $salary = json_decode($compensation->salary);
        
                    return [
                        'employee_compensation_id' => $compensation->id,
                        'company_id' => $compensation->company->id,
                        'company_name' => $compensation->company->company_name,
                        'salary_id' => $salary->id,
                        'salary_name' => $salary->salary_name,
                        'compensation_name' => $compensation->compensation_name,
                        'month' => date('m', strtotime($compensation->period)), // Ambil bulan dari kolom "period"
                        'year' => date('Y', strtotime($compensation->period)),   // Ambil tahun dari kolom "period"
                        'employee_compensations' => $employeeData,
                        'created_at' => $compensation->created_at,
                        'updated_at' => $compensation->updated_at,
                        
                    ];
                });

                return response()->json([
                    'status_code' => 200,
                    'status' => 'success',
                    'message' => 'Data Compensation berhasil diambil',
                    'data' =>  $transformedCompensations,
                ]);
            }

            

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
            // 'year' => ['required'],
            // 'month' => ['required'],
            'period' => ['required'],
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
            $compensation->period = $request->input('period');

            // $compensation->period = $year - $month - "-01";

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

            $data = Compensation::findOrFail($id);
            $data->delete();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data compensation berhasil dihapus',
                'data' => $data,
            ]);

        } catch (\Exception $error) {
            if ($error->getCode() == '23000') {
                return response()->json([
                    'status_code' => 500,
                    'status' => 'error',
                    'message' => 'Tidak dapat menghapus, Perusahaan masih digunakan tabel lain',
                ]);
            }

            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan',
            ], 500);
        }
    }

    public function salary(string $id)
    {
        $company = Salary::where('company_id', $id)->where('is_active', 1)->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Gaji Company berhasil diambil',
            'data' => $company,
        ]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Compensation;
use App\Models\Employee;
use App\Models\EmployeeCompensation;
use App\Models\EmployeeDetail;
use App\Models\Position;
use App\Models\Salary;
use App\Models\SalaryComponent;
use Carbon\Carbon;
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
            $bulanIndonesia = [
                'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
                'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'
            ];

            $salary = json_decode($compensation->salary);
            // Konversi data tanggal ke objek Carbon
            // $dbBulan = date('m', strtotime($compensation->period));
            $carbonDate = Carbon::parse($compensation->period);

            // Ambil bulan dalam bentuk angka (1-12)
            $bulanAngka = $carbonDate->month;

            // Konversi angka bulan menjadi nama bulan dalam bahasa Indonesia
            $bulanIndo = $bulanIndonesia[$bulanAngka - 1]; // -1 karena array dimulai dari 0
            return [
                'id' => $compensation->id,
                'company_id' => $compensation->company->id,
                'company_name' => $compensation->company->company_name,
                'salary_id' => $salary->id,
                'salary_name' => $salary->salary_name,
                'compensation_name' => $compensation->compensation_name,
                'month' => $bulanIndo, // Ambil bulan dari kolom "period"
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

        $bulanIndonesia = [
            'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
            'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'
        ];

        
        $validation = $this->validate($request, [
            'company_id' => ['required', 'exists:companies,id'],
            'salary_id' => ['required', 'exists:salaries,id'],
            'compensation_name' =>  ['required', 'string', 'unique:compensations,compensation_name', 'max:255'],
            'month' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
        ]);

        try {
            $salary = Salary::findOrFail($request->salary_id);

            // Pisahkan string bulan menjadi kata-kata
            $bulanArray = explode(' ', strtoupper($request->month));

            // Cari indeks bulan dalam array bulan Indonesia
            $bulanIndex = array_search($bulanArray[0], $bulanIndonesia);

            if ($bulanIndex !== false) {
                // Jika bulan ditemukan dalam daftar bulan Indonesia
                $bulan = str_pad($bulanIndex + 1, 2, '0', STR_PAD_LEFT); // Konversi indeks bulan ke format MM
            } else {
                // Tangani jika nama bulan tidak cocok dengan daftar bulan Indonesia
                // Anda dapat memberikan pesan kesalahan atau tindakan lain sesuai kebutuhan.
                    return response()->json([
                    'status_code' => 422,
                    'status' => 'error',
                    'message' => 'Inputan bulan tidak sesuai',
                ], 422);
            }

            // Create Compensation
            $compensation = Compensation::create([
                'company_id' => $request->company_id,
                'salary' => json_encode($salary),
                'compensation_name' =>  $request->compensation_name,
                'period' => ["month" => $bulan, "year" => $request->year]
            ]);

            // GetData Position
            $data = Position::with(
                'employeeDetails',
                'employeeDetails.position',
                'employeeDetails.position.company',
                'employeeDetails.position.company.location',
                'employeeDetails.position.directorate',
                'employeeDetails.position.division',
                'employeeDetails.position.section',
                'employeeDetails.position.job_grade',
                'employeeDetails.employee',
                'employeeDetails.eligible'
            )->where('company_id', $request->company_id)->get();


            for ($i = 0; $i < $data->count(); $i++) {
                for ($j = 0; $j < $data[$i]->employeeDetails->count(); $j++) {
                    if ($data[$i]->employeeDetails[$j]->eligible != null) {
                        //  Transformasi data sesuai format yang Anda inginkan
                            $descPosition =  [
                                "id" => $data[$i]->employeeDetails[$j]->position->id,
                                "position_name" => $data[$i]->employeeDetails[$j]->position->position_name,
                                "company_id" => $data[$i]->employeeDetails[$j]->position->company_id,
                                "company_name" => $data[$i]->employeeDetails[$j]->position->company[0]->company_name,
                                "location_id" => $data[$i]->employeeDetails[$j]->position->company[0]->location_id,
                                "location_name" => $data[$i]->employeeDetails[$j]->position->company[0]->location[0]->location_name,
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
        } catch (Exception $error) {
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

        $compensations = Compensation::with('company', 'employeeCompensations')->where('id', $id)->get();

        if ($compensations->count() <= 0) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        } else {
            // Transformasi data sesuai format yang Anda inginkan

            $transformedCompensations = $compensations->map(function ($compensation) {

                $bulanIndonesia = [
                    'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
                    'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'
                ];
                
                $carbonDate = Carbon::parse($compensation->period);

                // Ambil bulan dalam bentuk angka (1-12)
                $bulanAngka = $carbonDate->month;

                // Konversi angka bulan menjadi nama bulan dalam bahasa Indonesia
                $bulanIndo = $bulanIndonesia[$bulanAngka - 1]; // -1 karena array dimulai dari 0
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
                    'month' => $bulanIndo, // Ambil bulan dari kolom "period"
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

        $bulanIndonesia = [
            'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
            'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'
        ];

        $validation = $this->validate($request, [
            'compensation_name' =>  ['required', 'string', 'unique:compensations,compensation_name,' . $id . ''],
            'month' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
        ]);

        try {

            $compensation = Compensation::where('id', $id)->first();

            if ($compensation->count() <= 0) {
                return response()->json([
                    'status_code' => 404,
                    'status' => 'error',
                    'message' => 'Data tidak ditemukan',
                ], 404);
            } else {
                // Create Compensation
                
            // Pisahkan string bulan menjadi kata-kata
            $bulanArray = explode(' ', strtoupper($request->month));

            // Cari indeks bulan dalam array bulan Indonesia
            $bulanIndex = array_search($bulanArray[0], $bulanIndonesia);

            if ($bulanIndex !== false) {
                // Jika bulan ditemukan dalam daftar bulan Indonesia
                $bulan = str_pad($bulanIndex + 1, 2, '0', STR_PAD_LEFT); // Konversi indeks bulan ke format MM
            } else {
                // Tangani jika nama bulan tidak cocok dengan daftar bulan Indonesia
                // Anda dapat memberikan pesan kesalahan atau tindakan lain sesuai kebutuhan.
                    return response()->json([
                    'status_code' => 422,
                    'status' => 'error',
                    'message' => 'Inputan bulan tidak sesuai',
                ], 500);
            }

                $compensation->update([
                    'compensation_name' =>  $request->compensation_name,
                    'period' => ["month" => $bulan, "year" => $request->year]
                ]);

                return response()->json([
                    'status_code' => 200,
                    'status' => 'success',
                    'message' => 'Data Compensation berhasil diubah',
                    'data' => $compensation,
                ], 200);
            }
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

    public function detailEmployee(String $id)
    {
        // try {
        $compensations = EmployeeCompensation::where('id', $id)->limit(1)->get();

        if ($compensations->count() <= 0) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        } else {

            // Transformasi data sesuai format yang Anda inginkan


            $transformedCompensations = $compensations->map(function ($compensation) {

                $employeeInfo = json_decode($compensation['employee']);
                $positionInfo = json_decode($compensation['position']);
                $eligibleInfo = json_decode($compensation['eligible']);



                // ambil data dari tabel salary, salarydetail
                $querySalaryComponents = Salary::with(['salaryDetail'])->where('company_id', $positionInfo->company_id)->where('is_active', 1)->get();

                // format data querySalaryComponents
                $salaryDetails = $querySalaryComponents->flatMap(function ($salary) {
                    return $salary->salaryDetail->map(function ($detail) use ($salary) {
                        $detail->salary_name = $salary->salary_name;
                        return $detail;
                    });
                });


                // Destruktur Data
                $destructureSalaryDetail = [];
                foreach ($salaryDetails as $item) {
                    $checkData = null;

                    if (is_null($item->component_name)) {
                        $checkData = SalaryComponent::where('id', $item->salary_component_id)->get()->first();
                    }

                    if ($item->is_active) {
                        $salaryComponent = [
                            "component_id" => $item->id,
                            "order" =>  $item->order,
                            "salary_component_id" => $item->salary_component_id,
                            "component_name" => $checkData ? $checkData->component_name : $item->component_name,
                            "type" =>  $item->type,
                            "is_hide" =>  $item->is_hide,
                            "is_edit" =>  $item->is_edit,
                            "is_active" =>  $item->is_active,
                            "salary" => $item->salary_name,
                        ];

                        $destructureSalaryDetail[] = $salaryComponent;
                    }
                }

                // Mengambil Hanya unik data
                $uniqueSalaryDetails = [];

                $seen = [];

                foreach ($destructureSalaryDetail as $item) {
                    $key = $item['component_name'];

                    // Jika salary_component_id tidak null, maka tambahkan ke hasil jika belum ada
                    if ($item['salary_component_id'] !== null) {
                        if (!isset($seen[$key])) {
                            $uniqueSalaryDetails[] = $item;
                            $seen[$key] = true;
                        }
                    }
                    // Jika salary_component_id null, maka tambahkan ke hasil jika sudah ada atau jika salary berbeda
                    else {
                        if (!isset($seen[$key]) || $seen[$key] !== $item['salary']) {
                            $uniqueSalaryDetails[] = $item;
                            $seen[$key] = $item['salary'];
                        }
                    }
                }
                $fixed_pay = 0;
                $deductions = 0;
                // Array Untuk Set Status
                $result = [];
                // Loop melalui elemen-elemen array1
                foreach ($uniqueSalaryDetails  as $item1) {
                    $nominal = 0;


                    foreach (json_decode($eligibleInfo->salary_detail) as $item2) {
                        if ($item1['component_name'] === $item2->component_name && $item1['type'] === $item2->type) {
                            // && $item1['salary'] === $item2->salary)
                            if ($item2->nominal != 0) {
                                $nominal = $item2->nominal;
                                if ($item2->type == "deductions") {
                                    $deductions += $nominal;
                                } else {
                                    $fixed_pay += $nominal;
                                }
                            }
                            break;
                        }
                    }


                    $result[] = [
                        'component_id' => $item1["component_id"],
                        'salary_component_id' => $item1["salary_component_id"],
                        'component_name' => $item1["component_name"],
                        'type' => $item1['type'],
                        'order' => $item1['order'],
                        'is_hide' => $item1['is_hide'],
                        'is_edit' => $item1['is_edit'],
                        'is_active' => $item1['is_active'],
                        "nominal" => $nominal,
                        "salary" => $item1["salary"],
                    ];
                }

                return [
                    'employee_compensation_id' =>  $compensation->id,
                    'employee_id' =>  $employeeInfo->id,
                    'fullname' => $employeeInfo->fullname,
                    'nip' => $employeeInfo->nip,
                    'position_id' => $positionInfo->id,
                    'position_name' => $positionInfo->position_name,
                    'salary_components' => $result,
                    'fixed_pay' => $fixed_pay,
                    'deductions' => $deductions,
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

        // return response()->json([
        //     'status_code' => 200,
        //     'status' => 'success',
        //     'message' => 'Data Gaji Company berhasil diambil',
        //     'data' => $employeeCompensation,
        // ]);

        // } catch (Exception $error) {
        //     return response()->json([
        //         'status_code' => 500,
        //         'status' => 'error',
        //         'message' => 'Terjadi Kesalahan',
        //     ], 500);
        // }
    }

    public function editEmployee(Request $request, String $id)
    {
        // return 'ok';
        // $request->validate([
        //     'nominal' => 'numeric',
        // ]);

        $compensations = EmployeeCompensation::find($id);

        if (!$compensations) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        $compensations->nominal = $request->input('nominal');

        // simpan perubahan
        $compensations->save();

        $transformedCompensations = $compensations->map(function ($compensation) {

            $employeeInfo = json_decode($compensation['employee']);
            $positionInfo = json_decode($compensation['position']);
            $eligibleInfo = json_decode($compensation['eligible']);



            // ambil data dari tabel salary, salarydetail
            $querySalaryComponents = Salary::with(['salaryDetail'])->where('company_id', $positionInfo->company_id)->where('is_active', 1)->get();

            // format data querySalaryComponents
            $salaryDetails = $querySalaryComponents->flatMap(function ($salary) {
                return $salary->salaryDetail->map(function ($detail) use ($salary) {
                    $detail->salary_name = $salary->salary_name;
                    return $detail;
                });
            });


            // Destruktur Data
            $destructureSalaryDetail = [];
            foreach ($salaryDetails as $item) {
                $checkData = null;

                if (is_null($item->component_name)) {
                    $checkData = SalaryComponent::where('id', $item->salary_component_id)->get()->first();
                }

                if ($item->is_active) {
                    $salaryComponent = [
                        "component_id" => $item->id,
                        "order" =>  $item->order,
                        "salary_component_id" => $item->salary_component_id,
                        "component_name" => $checkData ? $checkData->component_name : $item->component_name,
                        "type" =>  $item->type,
                        "is_hide" =>  $item->is_hide,
                        "is_edit" =>  $item->is_edit,
                        "is_active" =>  $item->is_active,
                        "salary" => $item->salary_name,
                    ];

                    $destructureSalaryDetail[] = $salaryComponent;
                }
            }

            // Mengambil Hanya unik data
            $uniqueSalaryDetails = [];

            $seen = [];

            foreach ($destructureSalaryDetail as $item) {
                $key = $item['component_name'];

                // Jika salary_component_id tidak null, maka tambahkan ke hasil jika belum ada
                if ($item['salary_component_id'] !== null) {
                    if (!isset($seen[$key])) {
                        $uniqueSalaryDetails[] = $item;
                        $seen[$key] = true;
                    }
                }
                // Jika salary_component_id null, maka tambahkan ke hasil jika sudah ada atau jika salary berbeda
                else {
                    if (!isset($seen[$key]) || $seen[$key] !== $item['salary']) {
                        $uniqueSalaryDetails[] = $item;
                        $seen[$key] = $item['salary'];
                    }
                }
            }
            $fixed_pay = 0;
            $deductions = 0;
            // Array Untuk Set Status
            $result = [];
            // Loop melalui elemen-elemen array1
            foreach ($uniqueSalaryDetails  as $item1) {
                $nominal = 0;


                foreach (json_decode($eligibleInfo->salary_detail) as $item2) {
                    if ($item1['component_name'] === $item2->component_name && $item1['type'] === $item2->type) {
                        // && $item1['salary'] === $item2->salary)
                        if ($item2->nominal != 0) {
                            $nominal = $item2->nominal;
                            if ($item2->type == "deductions") {
                                $deductions += $nominal;
                            } else {
                                $fixed_pay += $nominal;
                            }
                        }
                        break;
                    }
                }


                $result[] = [
                    'component_id' => $item1["component_id"],
                    'salary_component_id' => $item1["salary_component_id"],
                    'component_name' => $item1["component_name"],
                    'type' => $item1['type'],
                    'order' => $item1['order'],
                    'is_hide' => $item1['is_hide'],
                    'is_edit' => $item1['is_edit'],
                    'is_active' => $item1['is_active'],
                    "nominal" => $nominal,
                    "salary" => $item1["salary"],
                ];
            }

            return [
                'employee_compensation_id' =>  $compensation->id,
                'employee_id' =>  $employeeInfo->id,
                'fullname' => $employeeInfo->fullname,
                'nip' => $employeeInfo->nip,
                'position_id' => $positionInfo->id,
                'position_name' => $positionInfo->position_name,
                'salary_components' => $result,
                'fixed_pay' => $fixed_pay,
                'deductions' => $deductions,
                'created_at' => $compensation->created_at,
                'updated_at' => $compensation->updated_at,

            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Compensation berhasil update',
            'data' =>  $transformedCompensations,
        ]);
    }

    public function updateEmployee(Request $request, String $id)
    {
        // return 'ok';
        $request->validate([
            'nominal' => 'numeric',
        ]);

        $compensations = EmployeeCompensation::find($id);

        if (!$compensations) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $compensations = new EmployeeCompensation();
        $compensations->nominal = $request->input('nominal');

        // simpan perubahan
        $compensations->save();

        $transformedCompensations = $compensations->map(function ($compensation) {

            $employeeInfo = json_decode($compensation['employee']);
            $positionInfo = json_decode($compensation['position']);
            $eligibleInfo = json_decode($compensation['eligible']);



            // ambil data dari tabel salary, salarydetail
            $querySalaryComponents = Salary::with(['salaryDetail'])->where('company_id', $positionInfo->company_id)->where('is_active', 1)->get();

            // format data querySalaryComponents
            $salaryDetails = $querySalaryComponents->flatMap(function ($salary) {
                return $salary->salaryDetail->map(function ($detail) use ($salary) {
                    $detail->salary_name = $salary->salary_name;
                    return $detail;
                });
            });


            // Destruktur Data
            $destructureSalaryDetail = [];
            foreach ($salaryDetails as $item) {
                $checkData = null;

                if (is_null($item->component_name)) {
                    $checkData = SalaryComponent::where('id', $item->salary_component_id)->get()->first();
                }

                if ($item->is_active) {
                    $salaryComponent = [
                        "component_id" => $item->id,
                        "order" =>  $item->order,
                        "salary_component_id" => $item->salary_component_id,
                        "component_name" => $checkData ? $checkData->component_name : $item->component_name,
                        "type" =>  $item->type,
                        "is_hide" =>  $item->is_hide,
                        "is_edit" =>  $item->is_edit,
                        "is_active" =>  $item->is_active,
                        "salary" => $item->salary_name,
                    ];

                    $destructureSalaryDetail[] = $salaryComponent;
                }
            }

            // Mengambil Hanya unik data
            $uniqueSalaryDetails = [];

            $seen = [];

            foreach ($destructureSalaryDetail as $item) {
                $key = $item['component_name'];

                // Jika salary_component_id tidak null, maka tambahkan ke hasil jika belum ada
                if ($item['salary_component_id'] !== null) {
                    if (!isset($seen[$key])) {
                        $uniqueSalaryDetails[] = $item;
                        $seen[$key] = true;
                    }
                }
                // Jika salary_component_id null, maka tambahkan ke hasil jika sudah ada atau jika salary berbeda
                else {
                    if (!isset($seen[$key]) || $seen[$key] !== $item['salary']) {
                        $uniqueSalaryDetails[] = $item;
                        $seen[$key] = $item['salary'];
                    }
                }
            }
            $fixed_pay = 0;
            $deductions = 0;
            // Array Untuk Set Status
            $result = [];
            // Loop melalui elemen-elemen array1
            foreach ($uniqueSalaryDetails  as $item1) {
                $nominal = 0;


                foreach (json_decode($eligibleInfo->salary_detail) as $item2) {
                    if ($item1['component_name'] === $item2->component_name && $item1['type'] === $item2->type) {
                        // && $item1['salary'] === $item2->salary)
                        if ($item2->nominal != 0) {
                            $nominal = $item2->nominal;
                            if ($item2->type == "deductions") {
                                $deductions += $nominal;
                            } else {
                                $fixed_pay += $nominal;
                            }
                        }
                        break;
                    }
                }


                $result[] = [
                    'component_id' => $item1["component_id"],
                    'salary_component_id' => $item1["salary_component_id"],
                    'component_name' => $item1["component_name"],
                    'type' => $item1['type'],
                    'order' => $item1['order'],
                    'is_hide' => $item1['is_hide'],
                    'is_edit' => $item1['is_edit'],
                    'is_active' => $item1['is_active'],
                    "nominal" => $nominal,
                    "salary" => $item1["salary"],
                ];
            }

            return [
                'employee_compensation_id' =>  $compensation->id,
                'employee_id' =>  $employeeInfo->id,
                'fullname' => $employeeInfo->fullname,
                'nip' => $employeeInfo->nip,
                'position_id' => $positionInfo->id,
                'position_name' => $positionInfo->position_name,
                'salary_components' => $result,
                'fixed_pay' => $fixed_pay,
                'deductions' => $deductions,
                'created_at' => $compensation->created_at,
                'updated_at' => $compensation->updated_at,

            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Compensation berhasil disimpan',
            'data' =>  $transformedCompensations,
        ]);
    }

    public function printEmployee() {
        return 'ok';
    }
}

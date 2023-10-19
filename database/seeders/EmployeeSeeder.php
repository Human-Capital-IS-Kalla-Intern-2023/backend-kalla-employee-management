<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Employees database
        $employee1 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee2 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee3 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee4 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee5 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee6 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee7 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee8 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee9 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);
        $employee10 = Employee::create([
            "nip" => "117",
            "fullname" => "Reynaldi liandi",
            "nickname" => "ryan@gmail.com",
            "hire_date" => "2023/08/13",
            "company_email" => "ry@ykalla.com",
        ]);


        // Employee Details database
        $detail1 = EmployeeDetail::create([
            'employee_id' => $employee1->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail2 = EmployeeDetail::create([
            'employee_id' => $employee2->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail3 = EmployeeDetail::create([
            'employee_id' => $employee3->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail4 = EmployeeDetail::create([
            'employee_id' => $employee4->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail5 = EmployeeDetail::create([
            'employee_id' => $employee5->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail6 = EmployeeDetail::create([
            'employee_id' => $employee6->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail7 = EmployeeDetail::create([
            'employee_id' => $employee7->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail8 = EmployeeDetail::create([
            'employee_id' => $employee8->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail9 = EmployeeDetail::create([
            'employee_id' => $employee9->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
        $detail10 = EmployeeDetail::create([
            'employee_id' => $employee10->id,
            'position_id' => 3,
            'status' => rand(1, 0),
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligible extends Model
{
    use HasFactory;

    protected $fillable = ['employee_detail_id', 'salary_detail', 'type_bank', 'account_number', 'account_name'];


    /**
     * user
     *
     * @return void
     */
    public function employeeDetail()
    {
        return $this->belongsTo(EmployeeDetail::class);
    }
}

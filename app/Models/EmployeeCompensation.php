<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCompensation extends Model
{
    use HasFactory;

    protected $table = 'employee_compensations';

    protected $fillable = ['compensations_id', 'employee', 'position', 'eligble'];
}

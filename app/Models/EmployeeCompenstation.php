<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCompenstation extends Model
{
    use HasFactory;

    protected $fillable = ['compensation_id', 'employee', 'position', 'eligible'];
}

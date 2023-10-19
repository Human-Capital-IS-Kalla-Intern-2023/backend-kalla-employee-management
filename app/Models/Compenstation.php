<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compenstation extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'salary_name', 'compensation_name', 'period'];
}

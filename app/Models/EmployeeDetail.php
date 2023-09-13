<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'employee_id',
        'position_id',
        'status',
    ];
    
    public function employee(){
        return $this->belongsToMany('employee_id', 'id');
    }

    public function position(){
        return $this->belongsToMany('position_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee_Detail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'employee_id',
        'position_id',
        'primary',
    ];
    
    public function employee(){
        return $this->belongsTo('employee_id', 'id');
    }

    public function position(){
        return $this->belongsTo('position_id', 'id');
    }
}

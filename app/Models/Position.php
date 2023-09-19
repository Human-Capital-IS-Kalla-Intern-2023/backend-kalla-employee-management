<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['company_id','position_name','directorat_id','division_id','section_id', 'job_grade_id'];

    public function employee(){
        return $this->belongsToMany(Employee::class, 'id', 'position')
        ->withPivot('status');
    }

    public function company(){
        return $this->hasMany(Company::class, 'id', 'company_id');
    }

    public function directorate(){
        return $this->hasMany(Directorat::class, 'id', 'directorat_id');
    }

    public function division(){
        return $this->hasMany(Division::class, 'id', 'division_id');
    }

    public function section(){
        return $this->hasMany(Section::class, 'id','section_id');
    }

    public function job_grade(){
        return $this->hasMany(JobGrade::class, 'id', 'job_grade_id');
    }

    // isal
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_detail');
    }
}

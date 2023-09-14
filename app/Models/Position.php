<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['position_name'];

    public function employee(){
        return $this->belongsToMany(Employee::class, 'id', 'position')
        ->withPivot('status');
    }

    public function company(){
        return $this->hasMany(Company::class, 'id', 'company_id');
    }

    public function job_grade(){
        return $this->hasMany(JobGrade::class, 'id', 'job_grade');
    }

    public function directorate(){
        return $this->hasMany(Directorat::class, 'id', 'directorate');
    }

    public function division(){
        return $this->hasMany(Division::class, 'id', 'division');
    }

    public function section(){
        return $this->hasMany(Section::class, 'id','section');
    }

    // isal
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_detail');
    }
}

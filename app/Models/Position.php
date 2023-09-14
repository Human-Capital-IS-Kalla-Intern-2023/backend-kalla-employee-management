<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['company_id','position_name','job_grade','directorate','division','section'];

    public function employee(){
        return $this->belongsToMany(Employee::class, 'id', 'position')
        ->withPivot('status');
    }

    public function company(){
        return $this->hasMany(Company::class, 'id', 'company_name');
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
}

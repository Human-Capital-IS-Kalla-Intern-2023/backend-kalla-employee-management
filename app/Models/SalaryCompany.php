<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryCompany extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['component','company_id','order','type','is_hide','is_edit','is_active'];

    public function salaryComponent() {
        return $this->belongsTo(SalaryComponent::class, 'id');
    }

    public function salaryCompany() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['salary_id', 'order', 'salary_component_id', 'component_name', 'type', 'is_hide', 'is_edit', 'is_active'];

    /**
     * Get the user associated with the SalaryDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salaryComponent(): HasOne
    {
        return $this->hasOne(SalaryComponent::class, 'salary_component_id', 'id');
    }

    // Definisikan accessor untuk computed field 'average_price'
    // public function getSalaryComponentAttribute()
    // {
    //     return $this->salary_component_id . $this->component_name;
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_id','salary_name','is_active'];

    /**
     * Get the user associated with the Salary
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function compensation(): HasOne
    {
        return $this->hasOne(Compensation::class, 'id', 'salary_id');
    }


    /**
     * Get the user that owns the Salary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salaryDetail(): HasMany
    {
        return $this->hasMany(SalaryDetail::class, 'salary_id', 'id');
    }

    
}

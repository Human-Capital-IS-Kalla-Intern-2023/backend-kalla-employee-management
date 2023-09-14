<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nip','fullname','nickname','hire_date','company_email'];

    // public function position(){
    //     return $this->belongsToMany(Position::class, 'id', 'position');
    //     // ->withPivot('status');
    // }

        
    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function employee(): BelongsTo
    // {
    //     return $this->belongsTo(Employee::class, 'foreign_key', 'other_key');
    // }

    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employeeDetail(): BelongsTo
    {
        return $this->belongsTo(EmployeeDetail::class, 'id', 'employee_id');
    }

    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'employee_details');
    }
}

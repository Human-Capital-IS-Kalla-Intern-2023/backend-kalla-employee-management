<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeDetail extends Model
{
    use HasFactory;



    protected $fillable = [
        'employee_id',
        'position_id',
        'status',
    ];
    
    // public function employee(){
    //     return $this->belongsTo('employee_id', 'id');
    // }

    
    // /**
    //  * Get all of the comments for the Company
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function position(): HasMany
    // {
    //     return $this->hasMany(Position::class, 'id', 'position_id');
    // }

    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function position(): HasMany
    // {
    //     return $this->hasMany(Position::class, 'id', 'position_id');
    // }

    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function employee(): HasMany
    // {
    //     return $this->hasMany(Employee::class, 'id', 'employee_id');
    //     // return $this->hasMany(Employee::class, 'id', 'employee_id');
    // }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    

}

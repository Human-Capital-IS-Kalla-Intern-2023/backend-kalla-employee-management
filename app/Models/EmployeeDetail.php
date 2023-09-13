<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeDetail extends Model
{
    use HasFactory, SoftDeletes;



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
    public function position(): HasMany
    {
        return $this->hasMany(Position::class, 'id', 'position_id');
    }

}

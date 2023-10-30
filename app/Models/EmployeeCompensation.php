<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeCompensation extends Model
{
    use HasFactory;

    protected $table = 'employee_compensations';

    protected $fillable = ['compensations_id', 'employee', 'position', 'eligible'];

    public function compensation(): BelongsTo
    {
        return $this->belongsTo(Compensation::class, 'compensations_id',  'id');
    }
}

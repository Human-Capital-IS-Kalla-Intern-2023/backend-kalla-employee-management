<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compensation extends Model
{
    use HasFactory;

    protected $table = 'compensations';

    protected $fillable = ['company_id', 'salary_id', 'compensation_name', 'period'];

    public function setPeriodAttribute($value)
    {
        // $value adalah array yang berisi bulan dan tahun dari form
        $month = $value['month'];
        $year = $value['year'];

        // Menggabungkan bulan dan tahun menjadi format yang sesuai, misalnya '2023-10-01'
        $combinedPeriod = "$year-$month-01";

        $this->attributes['period'] = $combinedPeriod;
    }

    /**
     * Get the company that owns the Compensation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class, 'salary_id', 'id');
    }

}

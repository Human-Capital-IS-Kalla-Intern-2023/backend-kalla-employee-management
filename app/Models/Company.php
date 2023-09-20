<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company_name', 'locations_id'];

    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function location(): HasMany
    {
        return $this->hasMany(Location::class, 'id', 'locations_id');
    }

    public function position(){
        return $this->belongsTo(Position::class, 'id', 'company_id');
    }

    public function salary(){
        return $this->hasMany(SalaryCompany::class, 'company_id', 'id');
    }
}

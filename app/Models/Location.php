<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['location_name'];

    /**
     * Get the user that owns the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

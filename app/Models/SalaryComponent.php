<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryComponent extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'slug';
    public $incrementing = false;

    protected $fillable = ['slug','component_name','is_hide','is_edit','is_active'];
}

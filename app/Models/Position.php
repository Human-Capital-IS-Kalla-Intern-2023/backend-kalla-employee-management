<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['position_name'];

    public function employee(){
        return $this->belongsToMany(Employee::class, 'id', 'position')
        ->withPivot('status');
    }

    public function division(){
        return $this->hasMany(Division::class, 'id', 'division_name');
    }

    public function section(){
        return $this->hasMany(Section::class, 'id', 'section_name');
    }
}

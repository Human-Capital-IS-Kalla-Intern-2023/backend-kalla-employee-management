<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['position_name'];

    public function Employee(){
        return $this->belongsTo(Employee::class, 'id', 'position');
    }

    public function Division(){
        return $this->hasMany(Division::class, 'id', 'division_name');
    }

    public function Section(){
        return $this->hasMany(Section::class, 'id', 'section_name');
    }
}

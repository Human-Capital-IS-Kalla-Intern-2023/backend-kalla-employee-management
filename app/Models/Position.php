<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['position_name','directorate','division','section'];

    public function Employee(){
        return $this->hasMany(Position::class);
    }

    public function Position(){
        return $this->hasMany(Division::class);
        return $this->hasMany(Section::class);
    }
}

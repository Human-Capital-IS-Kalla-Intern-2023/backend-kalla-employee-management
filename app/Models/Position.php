<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['position_name'];

    public function Position(){
        return [
            $this->hasMany(Division::class),
            $this->hasMany(Section::class),
        ];
    }
}

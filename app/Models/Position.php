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
            'employee' => $this->belongsTo(Employee::class),
            'sections' => $this->hasMany(Section::class),
            'divisions' => $this->hasMany(Division::class),
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['division_name'];

    public function division(){
        return $this->belongsTo(Position::class, 'id', 'position_name');
    }
}

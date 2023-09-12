<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['nip','fullname','nickname','hire_date','company_email'];

    public function Position(){
        return $this->hasMany(Position::class, 'id', 'position');
    }
}

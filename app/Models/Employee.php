<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nip','fullname','nickname','hire_date','company_email'];

    public function Position(){
        return $this->belongsToMany(Position::class, 'id', 'position')
        ->withPivot('status');
    }
}

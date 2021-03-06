<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='employees';
    protected $fillable = ['firstName','lastName','userName','address','email','password','gender','birthDate','salary','hireDate','phone'];
    public $timestamps = false;
}

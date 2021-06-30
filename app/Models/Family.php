<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
     protected $table='family_members';
    protected $fillable = ['firstName','lastName','relation','gender'];
    public $timestamps = false;
}

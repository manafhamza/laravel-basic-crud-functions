<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table='previous_experience';
    protected $fillable = ['experienceTitel','employer','years','months'];
    public $timestamps = false;
}

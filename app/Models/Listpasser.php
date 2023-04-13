<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listpasser extends Model
{
    use HasFactory;

    protected $fillable = [
        'appno',
        'fname',
        'mname',
        'lname',
        'ep',
        'rc',
        'sps',
        'qs',
        'ats',
        'oar',
        'school',  
        'status',
        'year',
    ];
}

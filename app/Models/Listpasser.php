<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listpasser extends Model
{
    use HasFactory;

    protected $fillable = ['appno', 'name', 'school', 'rating', 'status', 'year'];
}

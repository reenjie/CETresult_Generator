<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URequest extends Model
{
    use HasFactory;

    protected $fillable = ['userid', 'request', 'status','purpose'];
}

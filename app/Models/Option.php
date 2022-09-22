<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'question',
        'note',
        'option_key',
        'option_value',
        'ans',
        'status',
    ];


}

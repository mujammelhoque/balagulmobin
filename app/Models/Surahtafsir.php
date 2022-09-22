<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surahtafsir extends Model
{
    use HasFactory;
    protected $fillable = [
        'nav_id',
        'series_serial',
        'dt',
        'surah_no',
        'surah_name',
        'description',
        'class_rec',
        'class_rec_url',
        'class_note',
        'class_note_url',
    ];

  

}

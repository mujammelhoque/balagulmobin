<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id','teacher_id','book_id','chapter_id','topic_id','option1','option2','option3','option4','option5','option6','question','answer','note','status'
    ];
}

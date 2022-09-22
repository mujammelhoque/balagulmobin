<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','question_id','quiz_id','teacher_id','book_id','chapter_id','topic_id','question','answer','right_answer','note','status'
    ];
}

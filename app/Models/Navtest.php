<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navtest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id', 'title'];
    public function childs()
    {
        return $this->hasMany(Navtest::class, 'parent_id', 'id');
    }
}

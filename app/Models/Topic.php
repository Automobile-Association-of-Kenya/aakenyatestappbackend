<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $with = ['tests','questions'];
    public function questions()
    {
        
        return $this->hasMany(Question::class);
    }
    public function tests()
    {
        
        return $this->hasMany(Test::class);
    }
    public function videos()
    {
        
        return $this->hasMany(Video::class);
    }
}

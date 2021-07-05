<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $with = ['questions'];
    

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class)->withTrashed();
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}

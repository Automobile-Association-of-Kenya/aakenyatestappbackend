<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $with = ['tests','questions','videos','pdfs'];
    protected $fillable=[
        'order'
    ];
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
    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }
  
}

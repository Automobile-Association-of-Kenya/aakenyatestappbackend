<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function topic()
    {
        return $this->belongsTo(Topic::class)->withTrashed();
    }
    public function views()
    {
        return $this->hasMany(VideoView::class);
    }
}

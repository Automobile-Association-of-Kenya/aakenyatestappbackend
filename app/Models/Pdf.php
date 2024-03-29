<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    public function topic()
    {
        return $this->belongsTo(Topic::class)->withTrashed();
    }
    public function views()
    {
        return $this->hasMany(PdfRead::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    use HasFactory;
    // $with=['payment'];
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

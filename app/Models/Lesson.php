<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function price()
    {
        return $this->morphOne(Pricing::class, 'priceable');
    }
}

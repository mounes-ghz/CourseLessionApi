<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    public function priceable()
    {
        return $this->morphTo();
    }
}

<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Filterable;

    public function car()
    {
        return $this->belongsTo(Cars::class);
    }

    public function drive()
    {
        return $this->belongsTo(Drive::class);
    }

    public function engineType()
    {
        return $this->belongsTo(EngineType::class);
    }
}

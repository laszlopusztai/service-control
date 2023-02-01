<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSheet extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function car() : BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}

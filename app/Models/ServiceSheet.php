<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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

    /**
     * @return MorphToMany
     */
    public function tags() : MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function carType() : BelongsTo
    {
        return $this->belongsTo(CarType::class, 'type_id');
    }

    /**
     * @return MorphToMany
     */
    public function tags() : MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return HasMany
     */
    public function serviceSheets() : HasMany
    {
        return $this->hasMany(ServiceSheet::class);
    }
}

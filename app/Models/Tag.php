<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * @return MorphToMany
     */
    public function cars() : MorphToMany
    {
        return $this->morphedByMany(Car::class, 'taggable');
    }

    /**
     * @return MorphToMany
     */
    public function serviceSheets() : MorphToMany
    {
        return $this->morphedByMany(Car::class, 'taggable');
    }
}

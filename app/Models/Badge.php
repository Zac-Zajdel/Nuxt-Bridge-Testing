<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Badge extends Model
{
    use HasFactory;

    /**
     * Get all of the blogs that are assigned this badge.
     * @return MorphToMany
     */
    public function blogs(): MorphToMany
    {
        return $this->morphedByMany(Blog::class, 'badgable');
    }
}

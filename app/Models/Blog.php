<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\morphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'draft' => 'boolean',
    ];

    /**
     * Finds associated creator of blog
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Finds associated badges of a blog
     *
     * @return morphToMany
     */
    public function badges(): ?morphToMany
    {
        return $this->morphToMany(Badge::class, 'badgable');
    }
}

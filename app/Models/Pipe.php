<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pipe extends Model
{
    /** @use HasFactory<\Database\Factories\PipeFactory> */
    use HasFactory;

    /**
     * Get the upstream asset associated with the pipe.
     */
    public function upstreamAsset(): HasOne
    {
        return $this->hasOne(Asset::class);
    }

    /**
     * Get the downstream asset associated with the pipe.
     */
    public function downstreamAsset(): HasOne
    {
        return $this->hasOne(Asset::class);
    }

    /**
     * The projects that belong to the pipe.
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}

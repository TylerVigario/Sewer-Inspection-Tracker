<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pipe extends Model
{
    /** @use HasFactory<\Database\Factories\PipeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'upstream_asset_id',
        'downstream_asset_id',
        'size',
    ];

    /**
     * Get the upstream asset associated with the pipe.
     */
    public function upstreamAsset(): HasOne
    {
        return $this->hasOne(Asset::class, 'id', 'upstream_asset_id');
    }

    /**
     * Get the downstream asset associated with the pipe.
     */
    public function downstreamAsset(): HasOne
    {
        return $this->hasOne(Asset::class, 'id', 'downstream_asset_id');
    }

    /**
     * The projects that belong to the pipe.
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_pipes');
    }

    /**
     * Get inspection activities related to the pipe.
     */
    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    /**
     * Get cleaning activities related to the pipe.
     */
    public function cleanings(): HasMany
    {
        return $this->hasMany(Cleaning::class);
    }
}

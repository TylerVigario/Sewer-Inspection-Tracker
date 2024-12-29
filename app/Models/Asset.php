<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'asset_type_id',
        'address_id',
        'name',
        'lat',
        'lng',
        'depth',
    ];

    /**
     * Get the asset type
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(AssetType::class, 'asset_type_id');
    }

    /**
     * Get the asset type
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * The projects that belong to the asset.
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_assets');
    }

    /**
     * The upstream pipes that belong to the asset.
     */
    public function upstreamPipes(): HasMany
    {
        return $this->hasMany(Pipe::class, 'downstream_asset_id');
    }

    /**
     * The upstream pipes that belong to the asset.
     */
    public function downstreamPipes(): HasMany
    {
        return $this->hasMany(Pipe::class, 'upstream_asset_id');
    }

    /**
     * Get the asset full name
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->type->tag . ' ' . $this->name,
        );
    }

    /**
     * Get installation activities related to the asset.
     */
    public function installations(): HasMany
    {
        return $this->hasMany(Installation::class);
    }

    /**
     * Get the asset status.
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                $totalPipes = $this->upstreamPipes()->count() + $this->downstreamPipes()->count();
                if ($totalPipes > 0) {
                    $completePipes = 0;

                    foreach ($this->upstreamPipes as $pipe) {
                        if ($pipe->complete) {
                            $completePipes++;
                        }
                    }

                    foreach ($this->downstreamPipes as $pipe) {
                        if ($pipe->complete) {
                            $completePipes++;
                        }
                    }

                    if ($completePipes == $totalPipes) {
                        return __('Complete');
                    } else {
                        return $completePipes . '/' . $totalPipes;
                    }
                } else {
                    return __('Missing pipes');
                }
            }
        );
    }
}

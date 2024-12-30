<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
     * Get turns of the pipe.
     */
    public function turns(): HasMany
    {
        return $this->hasMany(PipeTurn::class);
    }

    /**
     * Get all pipe path.
     */
    public function path(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $points[] = [$this->upstreamAsset->lat, $this->upstreamAsset->lng];

                foreach ($this->turns()->sort("order")->get() as $turn) {
                    $points[] = [$turn->lat, $turn->lng];
                }

                $points[] = [$this->downstreamAsset->lat, $this->downstreamAsset->lng];
            },
        );
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

    /**
     * Whether the pipe has a complete inspection.
     */
    public function complete(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->inspections()->complete()->count() > 0;
            }
        );
    }

    /**
     * Get the pipe inspection status.
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->inspections()->complete()->count() > 0) {
                    return __('Complete');
                } else if ($this->inspections()->count() > 0) {
                    return __('No complete inspection');
                } else {
                    return __('Needs attempt');
                }
            }
        );
    }
}

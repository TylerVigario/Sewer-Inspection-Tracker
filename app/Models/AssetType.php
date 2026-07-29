<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssetType extends Model
{
    /** @use HasFactory<\Database\Factories\AssetTypeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the assets with this asset type
     */
    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class, 'asset_type_id', 'id');
    }
}

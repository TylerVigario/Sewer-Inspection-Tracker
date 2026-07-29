<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'number',
        'street_name',
        'unit',
        'city',
        'state',
        'zip_code',
    ];

    /**
     * Get the assets attached to the address
     */
    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class, 'address_id', 'id');
    }
}

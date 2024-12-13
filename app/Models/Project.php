<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'due',
        'lat',
        'lng'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'due' => 'datetime',
        ];
    }

    /**
     * The assets that belong to the project.
     */
    public function assets(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class);
    }

    /**
     * The assets that belong to the project.
     */
    public function pipes(): BelongsToMany
    {
        return $this->belongsToMany(Pipe::class);
    }

    /**
     * Get the Customer the Project belongs to.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}

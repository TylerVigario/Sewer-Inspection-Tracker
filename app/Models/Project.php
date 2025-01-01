<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'project_type_id',
        'customer_id',
        'name',
        'due',
        'lat',
        'lng',
        'city',
        'state',
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
     * Get the Project Type.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    /**
     * The assets that belong to the project.
     */
    public function assets(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class, 'project_assets');
    }

    /**
     * The assets that belong to the project.
     */
    public function pipes(): BelongsToMany
    {
        return $this->belongsToMany(Pipe::class, 'project_pipes');
    }

    /**
     * Get the Customer the Project belongs to.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get all of the inspections for this project.
     */
    public function inspections(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }

    /**
     * Get all of the inspections for this project.
     */
    public function cleanings(): HasMany
    {
        return $this->hasMany(Cleaning::class);
    }

    /**
     * Get all of the inspections for this project.
     */
    public function installations(): HasMany
    {
        return $this->hasMany(Installation::class);
    }
}

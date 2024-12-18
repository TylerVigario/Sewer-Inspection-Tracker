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
        'customer_id',
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
}

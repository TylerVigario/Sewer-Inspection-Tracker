<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inspection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'project_id',
        'pipe_id',
        'downstream',
        'complete',
        'remarks',
        'distance',
        'inspected_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'inspected_at' => 'datetime',
        ];
    }

    /**
     * Get the pipe the inspection was performed on.
     */
    public function pipe(): BelongsTo
    {
        return $this->belongsTo(Pipe::class);
    }

    /**
     * Get the project this inspection belongs to.
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }

    /**
     * Scope a query to only include complete inspections.
     */
    public function scopeComplete(Builder $query): void
    {
        $query->where('complete', true);
    }
}

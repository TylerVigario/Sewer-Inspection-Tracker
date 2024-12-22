<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cleaning extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'pipe_id',
        'downstream',
        'complete',
        'remarks',
        'distance',
    ];

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
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

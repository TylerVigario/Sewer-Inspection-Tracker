<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PipeTurn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'pipe_id',
        'order',
        'lat',
        'lng',
    ];

    /**
     * Get the pipe related to the turn.
     */
    public function pipe(): HasOne
    {
        return $this->hasOne(Pipe::class);
    }
}

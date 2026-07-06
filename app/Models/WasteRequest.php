<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WasteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'waste_type',
        'scheduled_date',
        'scheduled_time',
        'sector',
        'address',
        'weight',
        'notes',
        'collector_id',
        'status',
    ];

    /**
     * Get the citizen who made the request.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the collector assigned to the request.
     */
    public function collector(): BelongsTo
    {
        return $this->belongsTo(User::class, 'collector_id');
    }
}

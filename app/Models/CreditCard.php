<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class CreditCard extends Model
{
    /**
     * The table associated with the model.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'closing_day',
        'due_day',
        'limit',
        'user_id',
    ];

    /**
     * The attribute casts.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
    ];

    /**
     * Get the user that owns the credit card.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($creditCard) {
            $creditCard->id = Uuid::uuid4()->toString();
        });
    }

    /**
     * Get the user that owns the credit card.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class BankAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'bank_logo_id',
        'initial_balance',
        'initial_balance_date',
        'current_balance',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'initial_balance' => 'float',
        'current_balance' => 'float',
    ];

    /**
     * The "booting" method of the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bankAccount) {
            $bankAccount->id = Uuid::uuid4()->toString();
        });
    }

    /**
     * Get the user that owns the bank account.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the bank that owns the bank account.
     */
    public function logo(): string
    {
        return $this
            ->hasOne(BankLogo::class, 'id', 'bank_logo_id')
            ->first()->logo_url;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'city',
        'phone',
        'country',
        'region',
        'address',
        'postal_code',
        'account_id',
    ];

    public function fullAddress(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->address . ', ' . $this->country
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}

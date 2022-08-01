<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'city',
        'phone',
        'country',
        'region',
        'address',
        'postal_code',
        'account_id',
        'organization_id',

    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email'  ,
        'city' ,
        'phone'  ,
        'country' ,
        'region' ,
        'address' ,
        'postal_code' ,
        'accounts_id',
        'organizations_id'
   
    ];
}

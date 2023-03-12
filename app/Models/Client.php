<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'phone',
        'email'
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(ClientsCompany::class);
    }
}

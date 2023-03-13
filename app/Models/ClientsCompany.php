<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsCompany extends Model
{
    use HasFactory;

    protected $table = 'client_company';

    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'company_id',
    ];
}

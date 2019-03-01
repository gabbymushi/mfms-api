<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['ledger_name', 'interest','organization_id'];
}

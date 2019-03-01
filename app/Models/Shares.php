<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shares extends Model
{
    protected $fillable = ['member_id','share_amount', 'share_value','organization_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'member_id';
    public function heir(){
        return $this->hasOne('App\Models\Heir', 'member_id');

    }
}

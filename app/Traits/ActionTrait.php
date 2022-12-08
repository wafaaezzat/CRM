<?php

namespace App\Traits;

use App\Models\User;

trait ActionTrait
{
    public function users(){
        return $this->belongsToMany(User::class,'action_users')->withPivot('result','id')->withTimestamps();
    }
}

<?php

namespace App\Traits;

use App\Models\User;

trait RoleTrait
{
    public function users(){
        return $this->hasMany(User::class);
    }
}

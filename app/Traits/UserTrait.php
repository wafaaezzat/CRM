<?php


namespace App\Traits;
use App\Models\Role;
use Carbon\Carbon;

trait UserTrait
{
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}

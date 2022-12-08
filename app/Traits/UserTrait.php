<?php


namespace App\Traits;
use App\Models\Role;
use App\Models\User;

trait UserTrait
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }
}

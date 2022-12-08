<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionUser extends Model
{
    use HasFactory;

    protected $table = 'action_users';
    protected $guarded = [];
}

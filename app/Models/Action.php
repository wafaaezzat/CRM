<?php

namespace App\Models;

use App\Traits\ActionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory,ActionTrait;


    protected $table = 'actions';
    protected $guarded = [];
}

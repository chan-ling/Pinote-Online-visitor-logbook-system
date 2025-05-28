<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
 protected $fillable = [
    'name',
    'email',
    'phone',
    'purpose',
    'picture',
    'entry_time',
    'exit_time',
];
protected $casts = [
    'entry_time' => 'datetime',
    'exit_time' => 'datetime',
];




}

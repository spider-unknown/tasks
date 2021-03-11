<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['currency', 'value'];
}

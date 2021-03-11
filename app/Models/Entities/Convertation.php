<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Convertation extends Model
{
    protected $fillable = ['currency_from', 'currency_to', 'value', 'rate', 'converted_value'];
}

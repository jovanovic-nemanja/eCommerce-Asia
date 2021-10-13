<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'bdtdc_country';
    protected $fillable = ['name'];
}

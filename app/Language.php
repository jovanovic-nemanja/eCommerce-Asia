<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'bdtdc_language';
    protected $fillable = ['name','code','locale','image','directory','sort_order'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tradeshow_description extends Model
{
    protected $table = "bdtdc_tradeshow_descriptions";
    protected $fillable = ['tradeshow_id','language_id','title','description','meta_title','meta_description','meta_keyword'];
}

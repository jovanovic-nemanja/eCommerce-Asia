<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bdtdc_tradeshow extends Model
{
    protected  $table = 'bdtdc_tradeshows';
    protected  $fillable = ['category_id','country_id','location','duration','venue','date','images'];

    public function tradeshow_description(){
        return $this->hasOne('App\Tradeshow_description','tradeshow_id','id');
    }

    public function country(){
        return $this->belongsTo('App\Model\BdtdcCountry','country_id','id');
    }
}

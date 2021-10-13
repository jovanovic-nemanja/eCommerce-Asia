<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTradeshow extends Model
{
    protected  $table = 'bdtdc_tradeshows';
    protected  $fillable = ['category_id','country_id','location','duration','venue','date','images'];

    public function description()
    {
    	return $this->hasOne('App\Model\TradeshowDescription', 'tradeshow_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id' , 'id');
    }
    public function trade_country(){
        return $this->hasOne('App\Model\BdtdcCountry', 'id','country_id');
    }
}

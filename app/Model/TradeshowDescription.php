<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TradeshowDescription extends Model
{

    protected $table = "bdtdc_tradeshow_descriptions";
    protected $fillable = ['tradeshow_id','language_id','title','description','meta_title','meta_description','meta_keyword'];

    public function relation()
    {
    	 return $this->belongsTo('App\Model\BdtdcTradeshow', 'tradeshow_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcFormValue extends Model
{
    protected $table="bdtdc_form_values";

    public function tradeinfo()
    {
    	return $this->belongsTo('App\Model\BdtdcTradeInfo', 'anual_sales_volume');
    }
    public function tradeinfos()
    {
    	return $this->belongsTo('App\Model\BdtdcTradeInfo', 'trade.export_percentage');
    }
    
}

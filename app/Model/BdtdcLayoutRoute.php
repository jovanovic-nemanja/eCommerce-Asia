<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcLayoutRoute extends Model
{
    protected $table = 'bdtdc_layout_route';
	protected $guarded = array('created_at', 'updated_at');

  
  public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }
     public function bdtdcLayout(){
    	return $this->belongsTo('App\Model\BdtdcLayout', 'layout_id');
    }
}

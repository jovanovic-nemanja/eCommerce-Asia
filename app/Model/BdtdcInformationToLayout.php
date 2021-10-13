<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcInformationToLayout extends Model
{
    protected $table = 'bdtdc_information_to_layout';
	protected $guarded = array('created_at', 'updated_at');

  
  
    public function bdtdcInformation(){
		return $this->belongsTo('App\Model\BdtdcInformation', 'information_id');

   }
   public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }
     public function bdtdcLayout(){
    	return $this->belongsTo('App\Model\BdtdcLayout', 'layout_id');
    }
}

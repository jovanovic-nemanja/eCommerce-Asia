<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcInformationToStore extends Model
{
    protected $table = 'bdtdc_information_to_store';
	protected $guarded = array('created_at', 'updated_at');

  
  
    public function bdtdcInformation(){
		return $this->belongsTo('App\Model\BdtdcInformation', 'information_id');

   }
   public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }
    
}

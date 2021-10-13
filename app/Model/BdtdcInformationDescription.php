<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcInformationDescription extends Model
{
     protected $table = 'bdtdc_information_description';
	protected $guarded = array('created_at', 'updated_at');

  
  
    public function bdtdcInformation(){
		return $this->belongsTo('App\Model\BdtdcInformation', 'information_id');

   }
   public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}

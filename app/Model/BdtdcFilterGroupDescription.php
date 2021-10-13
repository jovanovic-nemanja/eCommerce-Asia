<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcFilterGroupDescription extends Model
{
    protected $table = 'bdtdc_filter_group_description';
	protected $guarded = array('created_at', 'updated_at');

  
  
    public function bdtdcFilterGroup(){
		return $this->belongsTo('App\Model\BdtdcFilterGroup', 'filter_group_id');

   }
   public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}

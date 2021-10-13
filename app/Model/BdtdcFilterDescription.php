<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcFilterDescription extends Model
{
    protected $table = 'bdtdc_filter_description';
	protected $guarded = array('created_at', 'updated_at');

  
  public function bdtdcFilter(){
		return $this->belongsTo('App\Model\BdtdcFilter', 'filter_id');

   }
    public function bdtdcFilterGroup(){
		return $this->belongsTo('App\Model\BdtdcFilterGroup', 'filter_group_id');

   }
   public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
}

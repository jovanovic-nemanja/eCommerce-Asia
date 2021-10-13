<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAttributeGroupDescription extends Model
{
    protected $table = 'bdtdc_attribute_group_description';
    protected $guarded = array('created_at', 'updated_at');

   
     public function bdtdcAttributeGroup(){
    	return $this->belongsTo('App\Model\BdtdcAttributeGroup', 'attribute_group_id');
    }
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	} 
}

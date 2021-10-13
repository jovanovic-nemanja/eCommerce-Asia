<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAttributeDescription extends Model
{
     protected $table = 'bdtdc_attribute_description';
    protected $guarded = array('created_at', 'updated_at');

   
     public function bdtdcAttribute(){
    	return $this->belongsTo('App\Model\BdtdcAttribute', 'attribute_id');
    }
	public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	} 

}

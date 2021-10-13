<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcAttribute extends Model
{
  	 protected $table = 'bdtdc_attributes';
    protected $guarded = array('created_at', 'updated_at');

   
    public function bdtdcAttributeGroup(){
    	return $this->belongsTo('App\Model\BdtdcAttributeGroup', 'attribute_group_id');
    }
    
}

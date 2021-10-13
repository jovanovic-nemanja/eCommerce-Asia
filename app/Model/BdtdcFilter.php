<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcFilter extends Model
{
    
 protected $table = 'bdtdc_filter';
	protected $guarded = array('created_at', 'updated_at');

  
    public function bdtdcFilterGroup(){
		return $this->belongsTo('App\Model\BdtdcFilterGroup', 'filter_group_id');

   }
}

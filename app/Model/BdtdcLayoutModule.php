<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcLayoutModule extends Model
{
    protected $table = 'bdtdc_layout_module';
	protected $guarded = array('created_at', 'updated_at');

  
  
     public function bdtdcLayout(){
    	return $this->belongsTo('App\Model\BdtdcLayout', 'layout_id');
    }
}

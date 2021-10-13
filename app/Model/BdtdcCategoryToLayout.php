<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCategoryToLayout extends Model
{
    
    protected $table = 'bdtdc_category_to_layout';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }

    public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }
     public function bdtdcLayout(){
    	return $this->belongsTo('App\Model\BdtdcLayout', 'layout_id');
    }



}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCategoryToStore extends Model
{
    protected $table = 'bdtdc_category_to_store';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }

    public function bdtdcStore(){
    	return $this->belongsTo('App\Model\BdtdcStore', 'store_id');
    }
     
}

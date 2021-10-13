<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCategoryFilter extends Model
{
     protected $table = 'bdtdc_category_filter';
    protected $guarded = array('created_at', 'updated_at');

   
   
     public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }
    public function bdtdcFilter(){
		return $this->belongsTo('App\Model\BdtdcFilter', 'filter_id');

	} 
}

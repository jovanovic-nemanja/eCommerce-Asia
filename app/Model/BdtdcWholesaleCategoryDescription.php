<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcWholesaleCategoryDescription extends Model
{
     protected $table = 'bdtdc_wholesale_category_description';
    protected $guarded = array('created_at', 'updated_at');

   
   
     public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcWholesaleCategory', 'category_id');
    }
    public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	} 
	public function bdtdcwholesaleCategory(){
    	return $this->hasOne('App\Model\BdtdcWholesaleCategory', 'category_id','id');
    }
}

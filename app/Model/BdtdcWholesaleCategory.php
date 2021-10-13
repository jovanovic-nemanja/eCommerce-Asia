<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcWholesaleCategory extends Model
{
    //
        protected $table = 'bdtdc_wholesale_category';
	    protected $guarded = array('created_at', 'updated_at');
	    
	    public function category_name()
	    {
	        return $this->hasOne('App\Model\BdtdcWholesaleCategoryDescription','category_id');
	    }

	    public function category_name_wholesale()
	    {
	        return $this->belongsTo('App\Model\BdtdcWholesaleCategoryDescription','category_id');
	    }
	    public function parent_cat()
	    {
	    	return $this->hasMany('App\Model\BdtdcCategory','parent_id','id');
	    }
}

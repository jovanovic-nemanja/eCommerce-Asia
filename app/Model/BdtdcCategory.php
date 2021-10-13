<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCategory extends Model
{
    //
        protected $table = 'bdtdc_category';
	    protected $guarded = array('created_at', 'updated_at');
	    
	    public function category_name()
	    {
	        return $this->hasOne('App\Model\BdtdcCategoryDescription','category_id');
	    }
	    public function product_category()
	    {
	    	return $this->hasMany('App\Model\BdtdcProductToCategory','category_id','id');
	    }
	    public function parent_cat()
	    {
	    	return $this->hasMany('App\Model\BdtdcCategory','parent_id','id');
	    }

	    public function cat_parent_cat()
	    {
	    	return $this->hasMany('App\Model\BdtdcCategory','parent_id','parent_id');
	    }

	    public function parent_cat_pro()
	    {
	    	return $this->hasMany('App\Model\BdtdcProductToCategory','parent_id','id');
	    }

	    public function sub_cat_pro()
	    {
	    	return $this->hasOne('App\Model\BdtdcProductToCategory','category_id','id');
	    }
	    public function sub_cat(){
	    	return $this->hasMany('App\Model\BdtdcCategory','parent_id','id');
	    }
	    

}

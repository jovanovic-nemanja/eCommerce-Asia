<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WholesaleProductCategoryModel extends Model
{
    //
    protected $table = 'bdtdc_product_to_wholesale_category';
    protected $guarded = array('created_at', 'updated_at');
    
    public function bdtdc_limited_lime_offers()
    {
        return $this->hasOne('App\Model\BdtdcLimitedTimeOffer','product_id');
    }
    public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id','id');
    }
    public function pro_parent_cat()
    {
        return $this->belongsTo('App\Model\BdtdcCategory', 'parent_id','id');
    }
}

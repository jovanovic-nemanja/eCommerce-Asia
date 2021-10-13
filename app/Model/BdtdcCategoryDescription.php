<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCategoryDescription extends Model
{
     protected $table = 'bdtdc_category_description';
    protected $guarded = array('created_at', 'updated_at');

   
   
    public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }
    public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	} 
	public function sub_cat()
	{
		return $this->hasMany('App\Model\BdtdcCategory','parent_id','category_id');
	}
	public function cat_name()
	{
		return $this->hasOne('App\Model\BdtdcCategory','id','category_id');
	}
}

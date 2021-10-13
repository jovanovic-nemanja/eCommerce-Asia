<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcMostViewCategory extends Model
{
    //
    protected $table = 'bdtdc_most_view_categorys';
	protected $guarded = array('created_at', 'updated_at');


	public function bdtdcMostViewCategory()
	{
		return $this->belongsTo('App\Model\BdtdcProductDescription','product_id','product_id');
	}
	public function cat_name()
	{
		return $this->hasOne('App\Model\BdtdcCategory','id','category_id');
	}
	public function parent_cat()
	{
		return $this->hasOne('App\Model\BdtdcCategory','id','parent_id');
	}
	public function most_product()
	{
		return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
	}
    public function product_image()
    {
        return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
     public function proimage()
    {
        return $this->belongsTo('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    
    public function proimages()
    {
        return $this->hasMany('App\Model\BdtdcProductImage', 'product_id','product_id');
    }

    public function product_image_new()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }

    public function proimages_new(){

        return $this->hasMany('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }

    public function proimage_new(){

        return $this->belongsTo('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }

 }

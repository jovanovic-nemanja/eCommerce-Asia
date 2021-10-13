<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductDescription extends Model
{
    protected $table = 'bdtdc_product_description';
	protected $guarded = array('created_at', 'updated_at');


	public function bdtdcProduct()
	{
		return $this->belongsTo('App\Model\BdtdcProduct','product_id');
	}

	public function bdtdcLanguage()
	{
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');
	}

	public function supplierrr()
	{
		return $this->hasOne('App\Model\BdtdcSupplierProduct','product_id','product_id');
	}

	public function bdtdcProductdescription()
	{
		return $this->belongsTo('App\Model\BdtdcProduct','product_id');
	}

	public function product_name_category()
	{
		return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
	}

	public function product_category()
	{
		return $this->belongsTo('App\Model\BdtdcProductToCategory','product_id','product_id');
	}

	public function product_image()
    {
        return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    
    public function proimages()
    {
        return $this->hasMany('App\Model\BdtdcProductImage', 'product_id','product_id');
    }

    public function product_image_new()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }
    
    public function proimages_new()
    {
        return $this->hasMany('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }

    public function scopeSearchByKeyword($query, $keyword)
	    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","$keyword%");
            });
        }
        return $query;
	 	}

	
}

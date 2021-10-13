<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcBangladeshGarment extends Model
{
    protected $table = 'bdtdc_bangladesh_garments';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'cat_id','id');
    }
    public function category_name(){
        return $this->hasOne('App\Model\BdtdcCategory', 'id','cat_id');
    }

    public function selected_copmany(){
    	return $this->belongsTo('App\Model\BdtdcCompany', 'company_id','id');
    }
    public function col_copmany(){
        return $this->hasOne('App\Model\BdtdcCompany', 'id','company_id');
    }
    
    public function selected_copmany_name(){
    	return $this->hasOne('App\Model\BdtdcCompanyDescription', 'company_id','company_id');
    }
     
     public function BdtdcSelectedSupplier_products()
     {
        return $this->hasOne('App\Model\BdtdcProduct','id','product_id');
     }
     public function pro_name_string()
     {
        return $this->hasOne('App\Model\BdtdcProductDescription','product_id','product_id');
     }

      public function select_product_image()
    {
        return $this->hasOne('App\Model\BdtdcProductImage', 'product_id','product_id');
    }
    public function select_product_images()
    {
        return $this->hasOne('App\Model\BdtdcProductImageNew', 'product_id','product_id');
    }
    public function cat_pro_price()
    {
        return $this->hasOne('App\Model\BdtdcProductPrice', 'product_id','product_id');
    }
    public function parent_cat()
    {
        return $this->hasOne('App\Model\BdtdcCategory','id','parent_cat_id');
    }
    public function pro_to_cat(){
        return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
    }
    public function cat_product()
    {
        return $this->hasOne('App\Model\BdtdcBangladeshGarment','cat_id','cat_id');
    }

    public function per_cat_product()
    {
        return $this->hasMany('App\Model\BdtdcBangladeshGarment','cat_id','cat_id');
    }
    
}

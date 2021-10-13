<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Builder;

class BdtdcProductImageNew extends Model
{
    protected $table = 'bdtdc_product_images';
	  protected $guarded = array('created_at', 'updated_at');

    //make all query order by asc
    /*protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('id', function (Builder $builder) {
            $builder->orderBy('id','asc');
        });
    }*/

   public function bdtdcProduct()
   {
		return $this->belongsTo('App\Model\BdtdcProduct','product_id','id');
   }
   public function bdtdcProductToCategory()
   {
		return $this->hasOne('App\Model\BdtdcProductToCategory','product_id','product_id');
   }
}

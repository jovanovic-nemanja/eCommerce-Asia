<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcCategoryPath extends Model
{
    protected $table = 'bdtdc_category_filter';
	protected $guarded = array('created_at', 'updated_at');

public function bdtdcCategory(){
    	return $this->belongsTo('App\Model\BdtdcCategory', 'category_id');
    }


}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcBannerImage extends Model
{
    protected $table = 'bdtdc_banner_image';
    protected $guarded = array('created_at', 'updated_at');

   
     public function bdtdcBanner(){
    	return $this->belongsTo('App\Model\BdtdcBanner', 'banner_id');
    }
}

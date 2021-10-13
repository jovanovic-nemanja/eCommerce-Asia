<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcBannerImageDescription extends Model
{
     protected $table = 'bdtdc_banner_image_description';
    protected $guarded = array('created_at', 'updated_at');

   
   public function bdtdcBannerImage(){
		return $this->belongsTo('App\Model\BdtdcBannerImage', 'banner_image_id');

	} 
     public function bdtdcBanner(){
    	return $this->belongsTo('App\Model\BdtdcBanner', 'banner_id');
    }
    public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	} 
}

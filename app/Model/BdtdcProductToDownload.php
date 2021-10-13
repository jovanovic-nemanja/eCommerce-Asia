<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductToDownload extends Model
{
     protected $table = 'bdtdc_product_to_download';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcProduct(){

	return $this->belongsTo('App\Model\BdtdcProduct','product_id');
}
public function bdtdcDownload(){
		return $this->belongsTo('App\Model\bdtdcDownload', 'download_id');

	}


	
}

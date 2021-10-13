<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcDownloadDescription extends Model
{
    protected $table = 'bdtdc_download_description';
	protected $guarded = array('created_at', 'updated_at');

  

 public function bdtdcDownload(){
		return $this->belongsTo('App\Model\bdtdcDownload', 'download_id');

	}
 public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}
    
}

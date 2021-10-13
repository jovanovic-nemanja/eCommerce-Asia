<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcPageTabs extends Model
{
    protected $table = 'bdtdc_page_tabs';
    protected $guarded = array('created_at', 'updated_at');

    public function page(){
        return $this->belongsTo('App\Model\BdtdcPage', 'page_id');
    }
}

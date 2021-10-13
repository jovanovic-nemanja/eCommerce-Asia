<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcPage extends Model
{
    //
    protected $table = 'bdtdc_pages';
	protected $guarded = array('created_at', 'updated_at');

    public function page_contents()
    {
        return $this->hasMany('App\Model\BdtdcPageContent','page_id');
    }

    public function content_descriptions()
    {
        return $this->hasMany('App\Model\BdtdcPageContentDescription', 'page_id');
    }

    public function content_categories()
    {
        return $this->hasMany('App\Model\BdtdcPageContentCategory', 'page_id');
    }

    public function bdtdc_page_tabs(){
        return $this->hasMany('App\Model\BdtdcPageTabs', 'page_id');
    }
}

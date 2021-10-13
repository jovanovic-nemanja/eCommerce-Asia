<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSitemap extends Model
{
    
        protected $table = 'bdtdc_footer_sitemap';
	    protected $fillable=['id','name','parent_id','slug','sort_order'];
	    
	    public function sub_category()
	    {
	        return $this->hasMany('App\Model\BdtdcSitemap', 'parent_id','id');
	    }
	  
   
}

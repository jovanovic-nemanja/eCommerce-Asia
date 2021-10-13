<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcPageContentDescription extends Model
{
    //
    protected $table = 'bdtdc_page_content_descriptions';
	protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['description','meta_key','meta_description','content_category_id','page_id'];

    public function bdtdc_page()
    {
        return $this->belongsTo('App\Model\BdtdcPage', 'page_id');
    }

    public function bdtdc_category()
    {
        return $this->belongsTo('App\Model\BdtdcPageContentCategory', 'content_category_id');
    }
}

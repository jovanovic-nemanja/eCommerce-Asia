<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcPageContentCategory extends Model
{
    //
    protected $table = 'bdtdc_page_content_categories';
	protected $guarded = array('created_at', 'updated_at');
    protected $fillable = ['name','parent_id','sort_name','prefix','page_id'];

    public function bdtdc_content_desc()
    {
        return $this->hasOne('App\Model\BdtdcPageContentDescription', 'content_category_id');
    }

    public function bdtdc_page()
    {
        return $this->belongsTo('App\Model\BdtdcPage', 'page_id');
    }

    public function content_parent_cat()
    {
        return $this->hasMany('App\Model\BdtdcPageContentCategory','parent_id','id');
    }
}

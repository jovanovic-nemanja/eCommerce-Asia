<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTemplateSetting extends Model
{
    //
    
    protected $table = 'bdtdc_template_settings';
    protected $guarded = array('created_at', 'updated_at');

    public function template_section()
	{
		return $this->belongsTo('App\Model\BdtdcTemplateSection','section_id','id');
	}
    
}
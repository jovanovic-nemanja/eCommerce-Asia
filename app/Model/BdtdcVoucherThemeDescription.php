<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcVoucherThemeDescription extends Model
{
    protected $table = 'bdtdc_voucher_theme_description';
	protected $guarded = array('created_at', 'updated_at');

	public function bdtdcVoucherTheme(){

	return $this->belongsTo('App\Model\BdtdcVoucherTheme','voucher_theme_id');
}
public function bdtdcLanguage(){
		return $this->belongsTo('App\Model\BdtdcLanguage', 'language_id');

	}



}

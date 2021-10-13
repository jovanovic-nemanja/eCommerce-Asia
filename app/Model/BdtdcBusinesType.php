<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcBusinesType extends Model
{
    //

    protected $table = 'bdtdc_busines_types';
	protected $guarded = array('created_at', 'updated_at');

	 public function suppliers()
	 {
	 	return $this->hasOne('App\Model\BdtdcSupplier','busines_type_id');
	 }
}

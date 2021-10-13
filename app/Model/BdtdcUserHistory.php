<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcOrder extends Model
{
    protected $table = 'bdtdc_user_history';
	protected $guarded = array('created_at', 'updated_at');


}
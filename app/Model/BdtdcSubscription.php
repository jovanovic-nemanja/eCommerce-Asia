<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcSubscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = ['id','email','token','is_active'];
	protected $guarded = array('created_at', 'updated_at');



}

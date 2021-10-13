<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    
    protected $table = 'activations';
    protected $guarded = array('created_at', 'updated_at');

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
}

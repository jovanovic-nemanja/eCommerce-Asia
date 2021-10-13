<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcProductDispute extends Model
{
    //
    
     protected $table = 'bdtdc_product_disputes';
     protected $fillable = ['reason','url','description','file'];
     protected $guarded = array('created_at', 'updated_at');
}

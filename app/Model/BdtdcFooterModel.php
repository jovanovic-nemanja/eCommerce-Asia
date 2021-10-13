<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcFooterModel extends Model
{
    protected $table="bdtdc_footers";
    protected $fillable=['id','category_name','parent_id','slug','status'];





  public function sub_pages(){

  		return $this->hasMany('App\Model\BdtdcFooterModel','parent_id','id')->where('status',1);
  }





}


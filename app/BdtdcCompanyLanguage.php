<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BdtdcCompanyLanguage extends Model
{
    protected $table="bdtdc_company_languages";
    protected $fillable=['company_id','language'];


    public function language(){
        return $this->belongsTo('App\BdtdcFormValue', 'language', 'id');
    }
}

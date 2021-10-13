<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTradeQuestions extends Model
{
    //
        protected $table = 'bdtdc_trade_questions';
	    protected $fillable = ['id','user_id','brif','descriptions','image','parent_category','sub_category','created_at','updated_at'];
	    
	    public function trade_answer()
	    {
	        return $this->belongsTo('App\Model\BdtdcTradeAnswer','id','question_id');
	    }
	    public function user()
	    {
	    	return $this->belongsTo('App\Model\User','user_id');
	    }
}
<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcTradeAnswer extends Model
{
    //
        protected $table = 'bdtdc_trade_answer';
	    protected $fillable = ['id','user_id','answer','question_id','created_at','updated_at'];


	    public function user()
	    {
	    	return $this->belongsTo('App\Model\User','user_id','id');
	    }
	    public function trade_questions()
	    {
	    	return $this->belongsTo('App\Model\BdtdcTradeQuestions','question_id','id');
	    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcChatMessages extends Model
{
	protected $table = 'bdtdc_chat_messages';
	protected $fillable = ['chat_id','message','attachment','sender_id','receiver_id','view','sender_view','receiver_view','active'];
	
	public function chat_sender_user()
    {
        return $this->hasOne('App\Model\User','id','sender_id');
    }
    public function chat_receiver_user()
    {
        return $this->hasOne('App\Model\User','id','receiver_id');
    }

}
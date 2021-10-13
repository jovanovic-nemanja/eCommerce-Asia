<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcChats extends Model
{
	protected $table = 'bdtdc_chats';
	protected $fillable = ['sender_id','receiver_id','is_active'];

	public function chat_messages()
	{
		return $this->hasMany('App\Model\BdtdcChatMessages','chat_id','id');
	}
	public function chat_sender_user()
    {
        return $this->hasOne('App\Model\User','id','sender_id');
    }
    public function chat_receiver_user()
    {
        return $this->hasOne('App\Model\User','id','receiver_id');
    }

}
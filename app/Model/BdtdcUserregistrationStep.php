<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BdtdcUserregistrationStep extends Model
{
    protected $table = 'bdtdc_user_registration_step';
    protected $fillable = ['user_id','step_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Phone
 * @package App
 */
class Contact extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'comment'];

}

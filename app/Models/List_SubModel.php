<?php

namespace itstep\models;

use Illuminate\Database\Eloquent\Model;

class List_SubModel extends Model
{
    protected $table = 'list_subscribers';

    public $timestamps = false;
    
    protected $fillable = ['list_id', 'subscriber_id'];
}

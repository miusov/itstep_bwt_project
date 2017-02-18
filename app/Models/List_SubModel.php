<?php

namespace itstep\models;

use Illuminate\Database\Eloquent\Model;

class List_SubModel extends Model
{
    protected $table = 'list_subscribers';
    
    protected $fillable = ['list_id', 'subscriber_id'];
}

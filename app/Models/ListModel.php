<?php

namespace itstep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListModel extends Model
{
	use SoftDeletes;  //подключаем трейт мнимого удаления записей

    protected $table = 'lists';  //указываем что работать будем с таблицей lists
    protected $fillable = ['user_id', 'name'];
    
}

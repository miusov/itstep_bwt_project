<?php

namespace itstep\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    public $timestamps = false;

    protected $table = 'email_send_settings';
    
    protected $fillable = ['user_id', 'type_send_id'];
}

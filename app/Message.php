<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $table = 'chat_messages';

    protected $primaryKey = 'id';

    public $timestamps = 'true';
}

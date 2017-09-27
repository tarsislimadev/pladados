<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model {

    protected $fillable = [
        'id', 'name', 'type', 'text', 'separator', 'quote_char', 'header', 'user_id',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model {

    protected $fillable = [
        'name', 'json', 'user_id',
    ];

}

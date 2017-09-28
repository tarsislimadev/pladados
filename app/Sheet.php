<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $table = 'spreadsheets';
    
    protected $fillable = [
        'name', 'type', 'text', 
    ];

}

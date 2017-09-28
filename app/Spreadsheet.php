<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spreadsheet extends Model
{
    protected $fillable = [
        'name', 'type', 'text', 
    ];

}

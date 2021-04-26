<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    protected $table = 'send';
    protected $fillable = [
        'name_reminiscent', 'contact_name', 'add', 'phone', 'status'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Take extends Model
{
    protected $table = 'take';
    protected $fillable = [
        'name_reminiscent', 'contact_name', 'add', 'phone', 'status'
    ];
}

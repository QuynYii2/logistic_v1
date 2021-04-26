<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment_details extends Model
{
    protected $table = 'shipment_details';
    protected $fillable = [
        'id_shipment', 'step', 'status'
    ];
}

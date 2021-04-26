<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    protected $table = 'shipments';
    protected $fillable = [
        'name_reminiscent_take', 'contact_name_take', 'add_take', 'phone_take', 'name_reminiscent_send', 'contact_name_send', 'add_send', 'phone_send', 'payment_methods',
        'commodities', 'quantity', 'mass', 'longs', 'wide', 'high', 'value_goods', 'collection_fee', 'vehicle', 'date', 'hours', 'minute', 'content_goods', 'note', 'status', 'bill_code', 'curent_location',
        'shipping'
    ];

}

<?php
namespace App\Repositories;
use App\Interfaces\ShipmentInterface;
use  App\Shipments;
class ShipmentRepository extends  EloquentRepository implements ShipmentInterface{

    public function getModel(): string
    {
        return Shipments::class;
    }
    public function search($key)
    {
        return $this->_model->where('bill_code' , $key)->get();
    }
}

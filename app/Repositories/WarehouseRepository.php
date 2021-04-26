<?php
namespace App\Repositories;
use App\Interfaces\WarehouseInterface;
use App\Warehouse;

class WarehouseRepository extends EloquentRepository implements WarehouseInterface {

    public function getModel(): string
    {
        return Warehouse::class;
    }
}

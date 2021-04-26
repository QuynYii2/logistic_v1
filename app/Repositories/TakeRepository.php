<?php
namespace App\Repositories;
use  App\Interfaces\TakeInterface;
use App\Take;

class TakeRepository extends EloquentRepository implements  TakeInterface{

    public function getModel(): string
    {
        return Take::class;
    }
}

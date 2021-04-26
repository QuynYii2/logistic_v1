<?php
namespace App\Repositories;
use App\Interfaces\SendInterface;
use  App\Interfaces\TakeInterface;
use App\Send;

class SendRepository extends EloquentRepository implements SendInterface {

    public function getModel(): string
    {
        return Send::class;
    }
}

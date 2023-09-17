<?php

namespace App\Repositories;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
class OrderRepository implements OrderRepositoryInterface
{
    public function storeOrder($data)
    {
        $data['process_id'] = random_int(1,10);
        $data['user_id'] = auth()->user()->id;
        return Order::create($data);
    }

}

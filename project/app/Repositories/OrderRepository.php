<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderRepository implements OrderRepositoryInterface
{
    public function storeOrder($data)
    {
        $data['process_id'] = random_int(1, 10);
        $data['user_id'] = auth()->user()->id;
        return Order::create($data);
    }

    public function submitRemoteServer($data)
    {
        $url = env('REMOTE_ENDPOINT_URL', 'https://wibip.free.beeceptor.com');
        $response = Http::post($url . '/order', [
            'Order_ID' => $data->id,
            'Customer_Name' => $data->customer_name,
            'Order_Value' => $data->order_value,
            'Order_Date' => $data->created_at,
            'Order_Status' => $data->status,
            'Process_ID' => $data->process_id,
        ]);
        Log::info("Remote Server Response");
        Log::info($response->body());
        Log::info("--------Enn-----------");
    }

}

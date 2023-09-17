<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $orderData;
    /**
     * Create a new job instance.
     */
    public function __construct($request)
    {
        $this->orderData = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = env('REMOTE_ENDPOINT_URL', 'https://wibip.free.beeceptor.com');
        $response = Http::post($url . '/order', [
            'Order_ID' => $this->orderData->id,
            'Customer_Name' => $this->orderData->customer_name,
            'Order_Value' => $this->orderData->order_value,
            'Order_Date' => $this->orderData->created_at,
            'Order_Status' => $this->orderData->status,
            'Process_ID' => $this->orderData->process_id,
        ]);
        Log::info("Remote Server Response");
        Log::info($response->body());
        Log::info("--------Enn-----------");
    }
}

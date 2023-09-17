<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Jobs\ProcessOrders;


class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $request = $request->validated();
        $order = $this->orderRepository->storeOrder($request);
        // $this->orderRepository->submitRemoteServer($order);
        ProcessOrders::dispatch($order)->afterCommit();
        return response()->json([
            'meta' => [
                'status' => true,
                'status_message' => 'Data found',
                'timestamp' => Carbon::now(),
            ],
            'data' => $order
        ], 201);
    }


}


<?php

namespace App\Http\Repository;

use App\Events\OrderCreated;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use App\Http\Requests\MakeOrderRequest;

use App\Models\Order;
use Illuminate\Validation\Factory;

class OrderRepository {
    public static function store(MakeOrderRequest $request) {
        try {
            $order = new Order;
            $order = Order::create($request->toArray());
            OrderCreated::dispatch($order);
            return true;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }
}

<?php

namespace App\Http\Repository;

use App\Events\OrderCreated;
use App\Http\Requests\MakeOrderRequest;

use App\Models\Courier;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

use Carbon\Carbon;

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
    public static function getAll() {
        return Order::all();
    }

    public static function attachToCourier(int $orderId, int $courierId)
    {
        try {
            $courier = Courier::find($courierId);
            $order = Order::find($orderId);
            $order->delegated_at = Carbon::now()->toDateTimeString();
            $courier->orders()->save($order);
            $order->save();
            return new JsonResponse(['message' => 'Заказ был успешно выдан курьеру']);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Не удалось выдать заказ курьеру, ошибка: '.$e->getMessage()], 400);
        }
    }
}

<?php

namespace App\Http\Repository;

use App\Events\OrderCreated;
use App\Http\Requests\MakeOrderRequest;

use App\Models\Courier;
use App\Models\Order;
use App\Models\Status;
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
        return Order::with(['status', 'courier'])->get();
    }

    public static function attachToCourier(int $orderId, int $courierId)
    {
        try {
            $courier = Courier::find($courierId);
            $order = Order::find($orderId);
            $order->delegated_at = Carbon::now()->toDateTimeString();
            $order->status()->associate(Status::find(STATUS::STATUS_DELEGATED));
            $courier->orders()->save($order);
            $order->save();
            return new JsonResponse(['message' => 'Заказ был успешно выдан курьеру']);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Не удалось выдать заказ курьеру, ошибка: '.$e->getMessage()], 400);
        }
    }

    public static function getCourierOrders(int $courierId)
    {
        return Courier::find($courierId)->orders()->with('status')->get();
    }

    public static function takeOrder($orderId)
    {
        $order = Order::find($orderId);
        $order->deliver_start = Carbon::now()->toDateTimeString();
        $order->status()->associate(Status::find(Status::STATUS_IN_PROCESS));
        $order->save();
    }

    public static function completeOrder($orderId)
    {
        $order = Order::find($orderId);
        $order->deliver_end = Carbon::now()->toDateTimeString();
        $order->status()->associate(Status::find(Status::STATUS_DELIVERED));
        $order->save();
    }
}

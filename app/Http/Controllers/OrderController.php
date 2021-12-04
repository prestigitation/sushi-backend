<?php

namespace App\Http\Controllers;

use App\Http\Repository\OrderRepository;
use App\Http\Requests\MakeOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
        $this->middleware('throttle:1,5')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderRepository::getAll();
        if($orders) {
            return new JsonResponse($orders);
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeOrderRequest $request)
    {
        try {
            $order = OrderRepository::store($request);
            if($order) {
                return new JsonResponse(['message' => 'Ваш заказ был успешно обработан. Ожидайте прибытия курьера!']);
            } else return new JsonResponse(['message' => 'Неправильные параметры заказа'],400);
        } catch (\Throwable $th) {
            dd($th);
            return abort(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::find($id) ?? abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attachToCourier(int $orderId, int $courierId)
    {
        return OrderRepository::attachToCourier($orderId,$courierId);
    }

    public function getCourierOrders(int $courierId)
    {
        return OrderRepository::getCourierOrders($courierId) ?? abort(404);
    }

    public function takeOrder(int $orderId)
    {
        return OrderRepository::takeOrder($orderId);
    }

    public function completeOrder(int $orderId)
    {
        return OrderRepository::completeOrder($orderId);
    }
}

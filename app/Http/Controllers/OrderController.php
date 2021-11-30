<?php

namespace App\Http\Controllers;

use App\Http\Repository\OrderRepository;
use App\Http\Requests\MakeOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
}

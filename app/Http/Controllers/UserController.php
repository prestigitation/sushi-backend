<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Courier;
use App\Models\Order;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function getAdmins()
    {
        return Admin::all();
    }

    public function getCouriers()
    {
        return Courier::all();
        //return Order::find(1)->couriers;
    }
}

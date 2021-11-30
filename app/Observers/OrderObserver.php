<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    public function creating(Order $order) {
        $order->email = Auth::user()->email;
    }
}

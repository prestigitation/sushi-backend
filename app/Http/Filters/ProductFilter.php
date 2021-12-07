<?php
namespace App\Http\Filters;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Request;

class ProductFilter {
    private $filter;
    public function __construct(string $filter)
    {
        $this->filter = $filter;
    }

    public function matchIndexProducts()
    {
        switch($this->filter) {
            case 'created_at': {
                return Product::whereNotNull('image_path')
                ->orderBy('created_at', 'desc')
                ->get();
            }
            case 'order_count' : {
                $popularityTable = [];
                Order::each(function(Order $order) use (&$popularityTable) {
                    $cart = json_decode($order->cart, true);
                    foreach($cart as $key => $value) {
                        if(isset($popularityTable[$value['id']])) {
                            $popularityTable[$value['id']] += $value['quantity'];
                        } else $popularityTable[$value['id']] = $value['quantity'];
                    }
                });
                ksort($popularityTable);
                return Product::find(array_keys($popularityTable)); // array keys - массив из id, сортированный по убыванию количества покупок
            }
        }
    }
}

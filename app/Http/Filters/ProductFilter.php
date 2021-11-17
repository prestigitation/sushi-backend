<?php
namespace App\Http\Filters;

use App\Http\Resources\ProductCollection;
use App\Models\Product;

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
        }
    }
}

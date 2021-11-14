<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

use App\Http\Resources\ProductCollection;

use App\Http\Services\ProductService;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/product",
     *     @OA\Response(response="200", description="Display listing of all avaliable Products."),
     *     @OA\Response(response="404", description="Response when Products not found")
     * ),
     */
    public function index()
    {
        $allProduct = ProductService::getAll();
        if($allProduct) {
            return new ProductCollection($allProduct);
        } else return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *     path="/api/product",
     *     @OA\Response(response="200", description="Stores a new Product in DB"),
     *     @OA\Response(response="403", description="Not authorized")
     *     @OA\Response(response="500", description="Response when there is an DB error")
     * ),
     */
    public function store(StoreProductRequest $request)
    {
            $validated = $request->validated();
            if($validated) {
                $Product = ProductService::store($request);
                if($Product) {
                    return response($Product,200);
                } else return abort(500);
            } else return abort(500);
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

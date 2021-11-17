<?php
namespace App\Http\Services;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Facades\Request;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductService {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public static function getAll()
    {
        return new ProductCollection(Product::all());
    }

    public static function getIndexPageProductsByFilter($filter) {
        $filter = new ProductFilter($filter);
        return new ProductCollection($filter->matchIndexProducts());
    }

    public static function getCarousel() {
        return new ProductCollection(Product::whereNotNull('image_path')
                                            ->where('in_stock', '!=', 0)
                                            ->limit(5)
                                            ->get());
    }


    public static function store(StoreProductRequest $request)
    {
        $product = new Product();
        $response = $product->forceFill($request->all());
        if($product->save()){
            return new JsonResource($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

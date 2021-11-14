<?php
namespace App\Http\Services;

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
     * @OA\Get(
     *     path="/category",
     *     @OA\Response(response="200", description="Respond with list of categories"),
     *     @OA\Response(response="404", description="Not found categories")
     * ),
     * @OA\Info(title="Get all avaliable categories", version="1")
     */
    public static function getAll()
    {
        return new ProductCollection(Product::all());
    }


    public static function store(StoreProductRequest $request)
    {
        $Product = new Product();
        $response = $Product->forceFill($request->all());
        if($Product->save()){
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

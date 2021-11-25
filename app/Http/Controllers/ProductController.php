<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

use App\Http\Resources\ProductCollection;

use App\Http\Repository\ProductRepository;
use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\JsonResponse;

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
        $allProduct = ProductRepository::getAll();
        if($allProduct) {
            return new ProductCollection($allProduct);
        } else return abort(404);
    }

    /**
     * @OA\Get(
     *     path="/api/product/index_page/products_list",
     *     @OA\Response(response="200", description="Returns products that will be displayed in the index page"),
     *     @OA\Response(response="404", description="Response when Products not found")
     *     @OA\Response(response="400", description="Response when filter is not defined, because index page needs it")
     * ),
     */
    public function getIndexPageProducts() {
        $filter = request()->input('filter');
        if($filter) {
            $products = ProductRepository::getIndexPageProductsByFilter($filter);
            if($products) {
                return new JsonResponse(compact('products'));
            } else return abort(404);
        } else return new JsonResponse(['message' => 'Для получения данных необходимо указать фильтр продукта в запросе'], 400);
    }

    public function getByCategory(Category $category) {

    }

    /**
     * @OA\Get(
     *     path="/api/product/index_page/carousel",
     *     @OA\Response(response="200", description="Returns products that will be displayed in the index page, in vue slick carousel"),
     *     @OA\Response(response="404", description="Response when Products not found")
     * ),
     */
    public function getIndexPageCarousel() {
        $carousel = ProductRepository::getCarousel();
        if($carousel) {
            return new JsonResponse(compact('carousel'));
        }
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
                $product = ProductRepository::store($request);
                if($product) {
                    return response($product,200);
                } else return abort(500);
            } else return abort(500);
    }

    /*@OA\Get(
     *     path="/api/product/{slug}",
     *     @OA\Response(response="200", description="Display listing of product by slug"),
     *     @OA\Response(response="404", description="Not found")
     *     @OA\Response(response="500", description="Response when there is an DB error")
     * ),
     */
    public function findBySlug(string $slug) {
        $product = ProductRepository::getProductPageData($slug);
        if(!$product) return abort(404);
        return new JsonResponse($product);
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

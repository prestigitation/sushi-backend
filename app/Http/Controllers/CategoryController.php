<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/category",
     *     @OA\Response(response="200", description="Returns a listing of all categories"),
     *     @OA\Response(response="404", description="Not found")
     * ),
     */
    public function index()
    {
        $allCategories = CategoryService::getAll();
        if($allCategories) {
            return new JsonResponse($allCategories);
        } else return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/api/category/grid_banner",
     *     @OA\Response(response="200", description="Returns a listing of categories that have banner image to display in index page"),
     *     @OA\Response(response="404", description="Not found")
     * ),
     */
    public function getBannerCategories() {
        $bannerCategories = CategoryService::getBannerCategories();
        if($bannerCategories) {
            return new JsonResponse($bannerCategories);
        } else return abort(404);
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

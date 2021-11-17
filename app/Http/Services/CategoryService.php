<?php

namespace App\Http\Services;

use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAll()
    {
        return new CategoryCollection(Category::all());
    }

    public static function getBannerCategories() {
        $bannerImages = Category::select('name','image','image_small', 'slug')
                                ->where('image', '!=', '')
                                ->get()
                                ->toArray();
        $smallBannerImages = [];
        $largeBannerImages = [];
        foreach($bannerImages as $image) {
            if($image['image_small'] === 1) {
                array_push($smallBannerImages, $image);
            } else array_push($largeBannerImages, $image);
        }
        $result = [
            'small_images' => $smallBannerImages,
            'large_images' =>  $largeBannerImages
        ];
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        //
    }
}

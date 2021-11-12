<?php

namespace App\Http\Controllers;

use App\Http\Resources\SushiCollection;
use App\Http\Services\SushiService;
use Illuminate\Http\Request;


class SushiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/sushi",
     *     @OA\Response(response="200", description="Display listing of all avaliable sushi."),
     *     @OA\Response(response="404", description="Response when Sushi not found")
     * ),
     * @OA\Info(title="Get All Sushi", version="1")
     */
    public function index()
    {
        $allSushi = SushiService::getAll();
        if($allSushi) {
            return new SushiCollection($allSushi);
        } else return abort(404);
    }

    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreSushiRequest;

use App\Http\Resources\SushiCollection;
use App\Http\Services\SushiService;
use Illuminate\Support\Facades\Response;

class SushiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/sushi",
     *     @OA\Response(response="200", description="Display listing of all avaliable sushi."),
     *     @OA\Response(response="404", description="Response when Sushi not found")
     * ),
     */
    public function index()
    {
        $allSushi = SushiService::getAll();
        if($allSushi) {
            return new SushiCollection($allSushi);
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
     *     path="/sushi",
     *     @OA\Response(response="200", description="Stores a new sushi in DB"),
     *     @OA\Response(response="403", description="Not authorized")
     *     @OA\Response(response="500", description="Response when there is an DB error")
     * ),
     */
    public function store(StoreSushiRequest $request)
    {
            $validated = $request->validated();
            if($validated) {
                $sushi = SushiService::store($request);
                if($sushi) {
                    return response($sushi,200);
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

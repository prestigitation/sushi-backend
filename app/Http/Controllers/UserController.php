<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Courier;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Repository\UserRepository;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $query = request()->get('search');
        if(Gate::allows('access_dashboard_as_admin') && $query) {
            return UserRepository::find($query);
        };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        if(Gate::allows('access_dashboard_as_admin')) {
            try {
                UserRepository::update($id);
                return new JsonResponse(['message' => 'Данные пользователя были успешно изменены!'], 200);
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Не удалось обновить данные о пользователе'], 400);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('access_dashboard_as_admin')) {
            try {
                UserRepository::delete($id);
                return new JsonResponse(['message' => 'Пользователь был успешно удален!'], 200);
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Не удалось удалить данные о пользователе'.$e->getmessage()], 400);
            }
        }
    }

    public function getAdmins()
    {
        return Admin::all();
    }

    public function getCouriers()
    {
        return Courier::all();
    }
}

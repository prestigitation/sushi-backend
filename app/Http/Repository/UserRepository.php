<?php
namespace App\Http\Repository;

use App\Models\Admin;
use App\Models\Courier;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;

class UserRepository
{
    public static function find(string $query) {
        $queryAsNumber = (int) $query;
        if($queryAsNumber !== 0) {
            return User::where('id', $queryAsNumber)->with('role')->get();
        } else return User::where('name','LIKE', '%'.$query.'%')->with('role')->get();
    }

    public static function update(int $id) {
        $user = User::where('id', $id)->first();
        $updatedFields = [];
        foreach(request()->input() as $key => $value) {
            if($key != '_method') {
                if($key == 'role') {
                    $user->role()->detach();
                    $user->role()->attach($value);
                } else {
                    $updatedFields[$key] = $value;
                }
            }
        }
        if($updatedFields) return $user->update($updatedFields);
    }

    public static function delete(int $id) {
        $user = User::where('id', $id)->first();
        $courier = Courier::find($id);
        $admin = Admin::find($id);
        if($courier) {
            Order::where('id', $courier->id)->each(function (Order $order) {
                $order->courier_id = null;
            });
            $courier->role()->detach();
        }
        if($admin) $admin->role()->detach();
        $user->role()->detach();
        return $user->delete();
    }
}

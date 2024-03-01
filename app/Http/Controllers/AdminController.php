<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ConfirmedOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function completeorder()
    {
        $usernumber = User::all()->count();
        $order = Order::where('status', 'delivered')->get();




        return view('home.completeorder', compact('usernumber', 'order'));

    }

    public function pendingorder()
    {
        $usernumber = User::all()->count();
        $order = Order::all();

        return view('admin.pendingorder', compact('usernumber', 'order'));

    }
    public function confirmorder(Request $request)
    {
        $user_id = $request->query('user_id');
        $id = $request ->query('id');
        $name = $request->query('name');
        $quantity = $request->query('quantity');
        $status = $request ->query('status');
        $amount = $request -> query('amount');

        $order = Order::find($id);
        $order -> status = $status;
        $order ->save();



        return redirect()->back();
    }
}

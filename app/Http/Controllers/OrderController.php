<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {

        $orders = Order::orderBy('created_at','desc')->paginate(25);

        return view('shop.order.list', [
            'orders' => $orders
        ]);
    }

    public function order($id) {

    	$order = Order::where('id', $id)->first();

    	return view('shop.order.index', [
    		'order' => $order,
    		'products' => $order->products()->where('order_id', $id)->paginate(9)
    	]);
    }
}

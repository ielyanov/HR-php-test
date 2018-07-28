<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderProduct;
use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'order'   => $order,
            'partners'   => Partner::orderBy('id', 'asc')->get(),
            'products'   => OrderProduct::join('products', 'order_products.product_id', '=', 'products.id')->
                                          where('order_id', $order->id)->paginate(9)
        ]);
    }

    public function update(Request $request, Order $order)
    {

        $validator = $request->validate([
            'client_email' => 'required|email|max:255',
            'partner'      => 'required|numeric',
            'status'       => 'required|numeric'
        ]);

        $order->update($request->except('total'));

        return redirect()->route('orders');
    }

    public function destroy($id)
    {
        //
    }
}

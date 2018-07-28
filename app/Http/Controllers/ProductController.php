<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        $products = Product::orderBy('created_at','desc')->paginate(25);

        return view('shop.product.list', [
            'products' => $products
        ]);
    }
}

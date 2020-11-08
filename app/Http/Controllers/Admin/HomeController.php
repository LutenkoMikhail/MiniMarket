<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $orders = Order::all();
        $products = Product::all();
        $categories = Category::all();

        return view('admin.home',[
            'users'=>$users,
            'orders'=>$orders,
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }
}

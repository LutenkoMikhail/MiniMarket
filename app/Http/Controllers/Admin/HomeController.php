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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home', [
            'users' => User::all(),
            'orders' => Order::all(),
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }
}

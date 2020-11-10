<?php

namespace App\Http\Controllers\Customer;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class CustomerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_product_5');
        $products = Product::with('category')->paginate($this->paginate);
        return view('welcome', ['products' => $products]);
    }

    public function AllOrders()
    {
        $this->paginate = Config::get('constants.paginate.paginate_order_2');
        $userOrders = Auth::user()->order()->latest()->paginate($this->paginate);
        return view('customer.orders',
            ['orders' => $userOrders]);
    }

    public function Account()
    {
        $userOrders = Auth::user()->order()->count();
        return view('customer.account',
            ['orders' => $userOrders]);
    }
}

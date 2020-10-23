<?php

namespace App\Http\Controllers\Customer;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class CustomerController extends Controller
{
    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_product_5');
        $products = Product::with('category')->paginate($this->paginate);
        return view('welcome', ['products' => $products]);
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_order_2');
        $userOrders = Auth::user()->order()->paginate($this->paginate);
        return view('customer.home',
            ['orders' => $userOrders]);
    }
}

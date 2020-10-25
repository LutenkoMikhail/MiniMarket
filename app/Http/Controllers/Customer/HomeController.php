<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_order_2');
        $userOrders = Auth::user()->orders()->paginate($this->paginate);
        return view('customer.home',
            ['orders' => $userOrders]);
    }
}

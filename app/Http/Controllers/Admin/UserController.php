<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_admin_order_5');
//        $users = User::select()->paginate($this->paginate);
        $users = User::with('role')->paginate($this->paginate);
        return view('admin.user.index', ['users' => $users]);
    }
}

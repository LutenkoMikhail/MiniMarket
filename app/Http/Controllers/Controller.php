<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $paginate;

    protected function redirectRoute($routeName, $statusName, $status)
    {
        return redirect()->route($routeName)->with($statusName, $status);
    }


    protected function redirectBack()
    {
        return redirect()->back();
    }

    protected function redirectBackWith($statusName, $status)
    {
        return redirect()->back()->with($statusName, $status);
    }
}

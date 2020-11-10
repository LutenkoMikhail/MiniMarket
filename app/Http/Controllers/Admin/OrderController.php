<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderUpdateRequest;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_admin_order_5');
        $orders = Order::with('user')->latest()->paginate($this->paginate);
        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('admin.order.show',
            [
                'order' => $order
            ]);
    }


    /**
     * @param Order $order
     */
    public function edit(Order $order)
    {
        $orderStatus = \App\Status::all('id', 'name');
        return view('admin.order.edit',
            [
                'order' => $order,
                'orderStatus' => $orderStatus
            ]);
    }

    /**
     * @param OrderUpdateRequest $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $idOrderStatus = \App\Status::where(
            'name',
            '=',
            $request['status']
        )->first('id');

        $order->status_id = $idOrderStatus['id'];
        $order->save();
        return redirect()->route('admin.orders.index')->with('status', 'Order status changed !');
    }

    /**
     * @param Order $order
     */
    public function destroy(Order $order)
    {
        if ($order) {
            $order->delete();
            return redirect()->route('admin.orders.index')->with('status', 'Deletion was successful !');
        } else {
            return redirect()->route('admin.orders.index')->with('status', 'An error occurred while deleting !');
        }
    }
}

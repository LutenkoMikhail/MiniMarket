<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\OrderCreateUpdateRequest;
use App\Product;
use App\Services\Email;
use App\Services\Messenger;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AddProductToCart(Request $request, Product $product)
    {
        Cart::instance('cart')->add(
            $product->id,
            $product->name,
            1,
            $product->price
        )->associate('App\Product');
        return redirect()->back()->with("status", "The product \"{$product->name}\" was successfully added to cart.");
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProductCount(Request $request, Product $product)
    {
        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );
        return redirect()->back()->with("status", "Quantity changed in '{$product->name}'' product");
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct(Request $request, Product $product)
    {
        Cart::instance('cart')->remove($request->rowId);
        return redirect()->back()->with("status", "The product \"{$product->name}\" removed from cart.");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createOrder(Request $request)
    {
        return view('cart.create', [
            'customerName' => Auth::user()->name
        ]);
    }

    /**
     * @param OrderCreateUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderCreateUpdateRequest $request)
    {
        $order = new \App\Order();
        $order->user_id = Auth::user()->id;
        $order->status_id = $order->InProcess();
        $order->name = $request->customername;
        $order->surname = $request->customersurname;
        $order->phone = $request->phone;
        $order->email = $request->email;

        if ($order->save()) {
            foreach (Cart::instance('cart')->content() as $product) {
                $order->product()->attach($product->id, [
                    'order_id' => $order->id,
                    'product_count' => $product->qty,
                    'product_price' => $product->price
                ]);
            }
            Cart::instance('cart')->destroy();

            $messenger = new Messenger(new Email());
            $messenger->send("A new order has been issued. Its number is {$order->id}. The customer is \" ".Auth::user()->name." \" .");

            return redirect()->route('customer.home')->with("status", "Order number  \"{$order->id}\" is accepted for processing. ");
        }
        return redirect()->back();
    }
}

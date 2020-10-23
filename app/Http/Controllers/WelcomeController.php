<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Config;

class WelcomeController extends Controller
{

    public function index()
    {
        $this->paginate = Config::get('constants.paginate.paginate_product_2');
        $products = Product::with('category')->paginate($this->paginate);
        return view('welcome', ['products' => $products]);
    }

    public function allProducts()
    {
        $this->paginate = Config::get('constants.paginate.paginate_product_5');
        $products = Product::with('category')->paginate($this->paginate);
        return view('product.all_products', ['products' => $products]);
    }

    public function allCategories()
    {
        $this->paginate = Config::get('constants.paginate.paginate_category_3');
        $categories = Category::with('product')->paginate($this->paginate);
        return view('category.all_categories', ['categories' => $categories]);
    }
    /**
     * @param Product$product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('product.parts.product', [
            'product' => $product
        ]);
    }


}

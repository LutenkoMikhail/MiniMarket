<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Config;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Category $category)
    {
        $this->paginate = Config::get('constants.paginate.paginate_product_5');
        $products = $category->product()->paginate($this->paginate);
        return view('category.category_show_products', [
            'products' => $products,
            'nameCategory' => $category->name
        ]);
    }
}

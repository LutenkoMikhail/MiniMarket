<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',
            [
                'categories' => $categories
            ]);
    }

    /**
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $pathImage = $request->image->store(
            "/images/products",
            'public'
        );

        $product = new \App\Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $pathImage;
        $product->category_id = $request->selectcategory;

        if ($product->save()) {

            return redirect()->route('products.index')->with("status", "A new product named \"{$product->name}\"  has been created. ");
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit',
            [
                'product' => $product,
                'categories' => $categories
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param \App\Product $product
     */
    public function update(ProductUpdateRequest  $request, Product $product)
    {

        Storage::delete($request->image);
        dd($product);
        $pathImage = $request->image->store(
            "/images/products",
            'public'
        );
        $status = 'Error saving  product !';
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $pathImage;
        $product->category_id = $request->selectcategory;

        if ($product->save()) {
            $status = 'Product updated !';
            return redirect()->route('product.index')->with('status', $status);
        }
        return redirect()->back()->with('status', $status);
    }

}

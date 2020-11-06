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
     * @param \App\Product $product
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
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $oldImage = $product->image;

        $pathImage = $request->image->store(
            "/images/products",
            'public'
        );

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $pathImage;
        $product->category_id = $request->selectcategory;

        if ($product->save()) {
            Storage::delete($oldImage);
            return redirect()->route('products.index')->with('status', 'Product updated !');
        }
        return redirect()->back()->with('status', 'Error saving  product !');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        if ($product && $product->order()->get()->count() !== 0) {
            return redirect()->route('products.index')->with('status',
                'There is no way to delete an item. Please remove the item from the order first!');
        }
        if ($product) {
            Storage::delete($product->image);
            $product->delete();
            return redirect()->route('products.index')->with('status', 'Deletion was successful !');
        } else {
            return redirect()->route('products.index')->with('status', 'An error occurred while deleting !');
        }
    }

}

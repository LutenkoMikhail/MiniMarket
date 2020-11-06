<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryCreateUpdateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * @param CategoryCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = new \App\Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect()->route('categories.index')->with("status", "A product category named  \"{$category->name}\"  has been created. ");
        }
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',
            [
                'category' => $category,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\CategoryUpdateRequest $request
     * @param \App\Category $category
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $status = 'Error saving  category !';
        $category->name = $request->name;
        $category->description = $request->description;
        if ($category->save()) {
            $status = 'Category updated !';
            return redirect()->route('categories.index')->with('status', $status);
        }
        return redirect()->back()->with('status', $status);
    }
    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($category && $category->product()->get()->count() !== 0) {
            return redirect()->route('categories.index')->with('status',
                'There is no way to delete a category. Please delete products with this category first !');
        }
        if ($category) {
            $category->delete();
            return redirect()->route('categories.index')->with('status', 'Deletion was successful !');
        } else {
            return redirect()->route('categories.index')->with('status', 'An error occurred while deleting !');
        }
    }
}

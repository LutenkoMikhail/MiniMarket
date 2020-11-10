<?php

namespace App\Providers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $countProducts=0;
        $countCategories=0;

        if (Schema::hasTable('products')) {
            $countProducts = Product::get()->count();
            view()->share('countProducts', $countProducts);
        }
        if (Schema::hasTable('categories')) {
            $countCategories = Category::get()->count();
            view()->share('countCategories', $countCategories);
        }
    }
}

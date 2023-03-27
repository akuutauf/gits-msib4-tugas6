<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home()
    {
        $products = [
            'products' => Product::all(),
            'carts' => Cart::all(),
            'figure_count' => DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', 'figure')->count(),
            'manga_count' => DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', 'manga')->count(),
            'nendoroid_count' => DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', 'nendoroid')->count(),
            'merchandise_count' => DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', 'merchandise')->count(),
            'accessories_count' => DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', 'accessories')->count(),
            'figure' => $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', '=', 'figure')->select('products.*')->get(),
            'manga' => $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', '=', 'manga')->select('products.*')->get(),
            'nendoroid' => $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', '=', 'nendoroid')->select('products.*')->get(),
            'merchandise' => $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', '=', 'merchandise')->select('products.*')->get(),
            'accessories' => $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', '=', 'merchandise')->select('products.*')->get(),
        ];

        // dd($products['cart_product']);
        return view('pages.customer.home', $products);
    }

    public function cart()
    {
        return view('pages.customer.cart');
    }

    public function admin()
    {
        $data = [
            'productsCount' => Product::count(),
            'categoriesCount' => Category::count(),
        ];

        return view('pages.admin.dashboard', $data);
    }
}

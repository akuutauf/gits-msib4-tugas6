<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all(),
        ];

        return view('pages.admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'action' => route('store.product'),
            'categories' => Category::all(),
        ];

        return view('pages.admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // fungsi validasi insert product
        $validated = $request->validate([
            'category_id' => 'required|string',
            'name' => 'required',
            'foto' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'release_date' => 'required',
            'status' => 'required',
        ]);

        // validasi field satu persatu sebelum melakukan insert
        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'foto' => $validated['foto'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
            'release_date' => $validated['release_date'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('index.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'products'  => Product::find($id),
            'action' => route('update.product', $id),
            'categories' => Category::all(),
        ];

        return view('pages.admin.product.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // fungsi validasi update product
        $validated = $request->validate([
            'category_id' => 'required|string',
            'name' => 'required',
            'foto' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'release_date' => 'required',
            'status' => 'required',
        ]);

        // validasi field satu persatu sebelum melakukan update
        Product::where('id', $id)->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'foto' => $validated['foto'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
            'release_date' => $validated['release_date'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('index.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->route('index.product');
    }
}

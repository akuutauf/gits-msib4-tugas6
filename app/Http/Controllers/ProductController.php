<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'products' => Product::orderBy('created_at', 'asc')->get(),
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
            'categories' => Category::orderBy('name', 'asc')->get(),
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
            'foto' => 'required|mimes:jpg,jpeg,png,webp|max:10240',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'release_date' => 'required',
            'status' => 'required',
        ]);

        // mengecek apakah field untuk upload foto sudah upload atau belum
        if ($request->file('foto')) {
            $saveData['foto'] = Storage::putFile('public/product', $request->file('foto'));
        }

        // validasi field satu persatu sebelum melakukan insert
        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'foto' => $saveData['foto'],
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
        // get data foto product
        $data = Product::findOrFail($id);

        // fungsi validasi update product
        $validated = $request->validate([
            'category_id' => 'required|string',
            'name' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,webp|max:10240',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'release_date' => 'required',
            'status' => 'required',
        ]);

        // mengecek apakah field untuk upload foto sudah upload atau belum
        if ($request->file('foto')) {
            // hapus data foto sebelumnya terlbih dahulu
            Storage::delete($data->foto);

            // simpan foto yang baru
            $saveData['foto'] = Storage::putFile('public/product', $request->file('foto'));
        } else {
            $saveData['foto'] = $data->foto;
        }

        // validasi field satu persatu sebelum melakukan update
        Product::where('id', $id)->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'foto' =>  $saveData['foto'],
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

        // hapus data foto
        Storage::delete($data->foto);

        // hapus data
        $data->delete();

        return redirect()->route('index.product');
    }
}

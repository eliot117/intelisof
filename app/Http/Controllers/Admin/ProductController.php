<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $productos = Product::all();
        return view('admin.productos.index', ['productos' => $productos]);
    }

    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
        $fileNameWithTheExtension = request('image_product')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_product')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_product')->storeAs('public/productos', $newFileName);

        $user = auth()->user();

        $posts = new Product();
        $posts->name_product  = request('name_product');
        $posts->stock         = request('stock');
        $posts->code          = request('code');
        $posts->image_product = $newFileName;
        $posts->user_id       = $user->id;
        $posts->save();

        return redirect()->route('producto.index');
    }

    public function show($id)
    {
        $productos = Product::findOrFail($id);
        return view('admin.productos.show', ['productos' => $productos]);
    }

    public function edit($id)
    {
        $productos = Product::findOrFail($id);
        return view('admin.productos.edit', ['productos' => $productos]);
    }

    public function update(Request $request, $id)
    {
        $fileNameWithTheExtension = request('image_product')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_product')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_product')->storeAs('public/productos', $newFileName);

        $user = auth()->user();

        $posts = Product::findOrFail($id);

        $posts->name_product  = request('name_product');
        $posts->stock         = request('stock');
        $posts->code          = request('code');
        $posts->image_product = $newFileName;
        $posts->user_id       = $user->id;
        $posts->save();

        return redirect()->route('producto.index');
    }

    public function destroy($id)
    {
        $productos = Product::findOrFail($id);
        return redirect()->route('productos.index');
    }
}

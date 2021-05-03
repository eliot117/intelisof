<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('api.products.index',['product' => $product]);
    }

    public function store(Request $request)
    {
        $fileNameWithTheExtension = request('image_product')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_product')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_product')->storeAs('public/productos', $newFileName);

        $user = auth()->user();

        $posts = new Noticia();
        $posts->name_product  = request('name_product');
        $posts->stock         = request('stock');
        $posts->code          = request('code');
        $posts->image_product = $newFileName;
        $posts->user_id       = $user->id;
        $posts->save();

        return $product;
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
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

        return $product;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return $product;
    }
}

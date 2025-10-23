<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $products = Product::findOrfail($id);
        return view('admin.products.show', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::findOrfail($id);
        return view('admin.products.edit', compact('products'));
    }

    public function update(Request $request,$id)
    {
        $validate->Validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'stock'=>'required|integer',
        ]);

        $products = Product::findOrfail($id);
        $products = Product::update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock,
        ]);
        return redirect()->route()->with('success','Produk berhasil duperbarui');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store (Request $request)

    {
        $validate->Validate([
            'category_id'=>'required|integer',
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'stock'=>'required|integer',
            'image'=>'nullable|image|max:2048',
        ]);

        $product = Product::create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'image'=>$request->image,
        ]);
        return redirect()->route('admin.products.index')->with('success','Produk berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $products = Product::findOrfail($id);
        $products->delete();
        return redirect()->route('admin.products.index')->with('success','Produk berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return Inertia::render('Products/Index', ['data' => $data]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store()
    {
        Product::create(
            Request::validate([
                'name' => ['required'],
                'description' => ['required'],
                'retailprice' => ['required'],
                'wholesaleprice' => ['required'],
            ])
        );
        return Redirect::route('products')->with('success', 'Product created.');
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'retailprice' => $product->retailprice,
                'wholesaleprice' => $product->wholesaleprice,
            ],
        ]);
    }

    public function update(Product $product)
    {
        $product->update(
            Request::validate([
                'name' => ['required'],
                'description' => ['required'],
                'retailprice' => ['required'],
                'wholesaleprice' => ['required'],
            ])
        );

        return Redirect::route('products')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::back()->with('success', 'Product deleted.');
    }
}

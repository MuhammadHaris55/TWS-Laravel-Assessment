<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Inertia\Inertia;


class SaleController extends Controller
{
    public function index()
    {
        $data = Sale::all();
        return Inertia::render('Sales/Index', ['data' => $data]);
    }

    public function create()
    {
        $customer = Customer::all();
        $product = Product::all();

        return Inertia::render('Sales/Create', ['customer' => $customer, 'product' => $product]);
    }

    public function store()
    {
        Sale::create(
            Request::validate([
                // 'title' => ['required', 'max:30'],
                'reference' => ['required'],
                'body' => ['required'],
                'body' => ['required'],
            ])
        );
        return Redirect::route('sales')->with('success', 'Sale created.');
    }

    public function show(Sale $sale)
    {
    }

    public function edit(Sale $sale)
    {
        return Inertia::render('Sales/Edit', [
            'sale' => [
                'id' => $sale->id,
                'title' => $sale->title,
                'body' => $sale->body,
            ],
        ]);
    }

    public function update(Sale $sale)
    {
        $sale->update(
            Request::validate([
                'title' => ['required', 'max:30'],
                'body' => ['required'],
            ])
        );

        return Redirect::route('sales')->with('success', 'Sale updated.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return Redirect::back()->with('success', 'Sale deleted.');
    }
}

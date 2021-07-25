<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $data = Customer::all();
        return Inertia::render('Customers/Index', ['data' => $data]);
    }

    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    public function store()
    {
        Customer::create(
            Request::validate([
                'name' => ['required'],
                'email' => ['required'],
                'phone' => ['required'],
            ])
        );
        return Redirect::route('customers')->with('success', 'Customer created.');
    }

    public function show(Customer $customer)
    {
    }

    public function edit(Customer $customer)
    {
        return Inertia::render('Customers/Edit', [
            'customer' => [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
            ],
        ]);
    }

    public function update(Customer $customer)
    {
        $customer->update(
            Request::validate([
                'name' => ['required'],
                'email' => ['required'],
                'phone' => ['required'],
            ])
        );

        return Redirect::route('customers')->with('success', 'Customer updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::back()->with('success', 'Customer deleted.');
    }
}

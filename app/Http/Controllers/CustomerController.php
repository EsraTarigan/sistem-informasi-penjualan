<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $dataCustomers = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        Customer::create($dataCustomers);

        return redirect()->route('customers.index')
                         ->with('success' , 'Customer have been Created.');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $dataCustomers = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $customer->update($dataCustomers);

        return redirect()->route('customers.index')
                         ->with('success' , 'Customer have been Updated.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
                         ->with('succes', 'Customer have been Deleted.');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::all();

        return view('dashboard.customers.index', compact('customers'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        $subscriptions = $customer->subscriptions;
        return view('dashboard.customers.show', compact('customer', 'subscriptions'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display the new Customer profile form.
     */
    public function create(): View
    {
        return view('customer.edit');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Customer::class)],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
        ]);

        return Redirect::route('customer.edit', $customer);
    }

    /**
     * Display the Project view.
     */
    public function show(Customer $customer): View
    {
        return view('customer.show', [
            'customer' => $customer,
        ]);
    }

    /**
     * Display the Customer's profile form.
     */
    public function edit(Customer $customer): View
    {
        return view('customer.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the customer's profile information.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Customer::class)->ignore($customer->id)],
        ]);

        $customer->fill([
            'name' => $request->name,
        ])->save();

        return Redirect::route('customer.edit', $customer);
    }
}

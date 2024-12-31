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
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customers.index', [
            'customers' => Customer::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Customer::class)],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return Redirect::route('customers.index');
    }

    /**
     * Display the Project view.
     */
    public function show(Customer $customer): View
    {
        return view('customers.show', [
            'customer' => $customer,
        ]);
    }

    /**
     * Display the Customer's profile form.
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the customer's profile information.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Customer::class)->ignore($customer->id)],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
        ]);

        $customer->fill([
            'name' => $request->name,
            'email' => $request->email,
        ])->save();

        return Redirect::route('customers.edit', $customer)->with('status', 'customer-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

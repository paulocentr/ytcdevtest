<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for this test we gonna load all users, but the best but not show if we can is to use some async while input is tiped
        return view('customers.index');
    }

    public function get()
    {
        return response()->json(auth()->user()->customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'document' => 'required|min:6|max:12',
            ],
            [
                'name.required' => 'Name is required',
                'document.required' => 'Document is required',
                'document.min' => 'Document must have at least 6 charaters',
                'document.max' => 'Document cannot have more than 12 charaters',
            ]
        );

        $validator->validate();

        $customer = Customer::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'document' => $request->document,
        ]);

        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|exists:users,id',
                'name' => 'required',
                'document' => 'required|min:6|max:12',
            ],
            [
                'user_id.required' => 'User is required',
                'user_id.exists' => 'User does not exists',
                'name.required' => 'Name is required',
                'document.required' => 'Document is required',
                'document.min' => 'Document must have at least 6 charaters',
                'document.max' => 'Document cannot have more than 12 charaters',
            ]
        );

        $validator->validate();

        $customer->update($request->all());

        return back()->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        //
    }

    public function get(Customer $customer)
    {
        return response()->json($customer->numbers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'number' => 'required|min:8|max:14',
                'status' => 'required',
            ],
            [
                'number.required' => 'Number is required',
                'number.min' => 'Number must have at least 8 charaters',
                'number.max' => 'Number cannot have more than 14 charaters',
                'status.required' => 'Status is required',
            ]
        );

        $validator->validate();

        $number = $customer->numbers()->create($request->all());
        return response()->json($number);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Number $number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Number $number)
    {
        return view('numbers.edit', ['customer' => $customer, 'number' => $number]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Number $number)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'number' => 'required|min:8|max:14',
                'status' => 'required',
            ],
            [
                'number.required' => 'Number is required',
                'number.min' => 'Number must have at least 8 charaters',
                'number.max' => 'Number cannot have more than 14 charaters',
                'status.required' => 'Status is required',
            ]
        );

        $validator->validate();

        $number->update($request->all());

        return back()->with('success', 'Number updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Number $number)
    {
        $number->delete();
        return back()->with('success', 'Customer number deleted successfully');
    }
}

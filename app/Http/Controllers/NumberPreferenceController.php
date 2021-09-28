<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Number;
use App\Models\NumberPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NumberPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer, Number $number)
    {
        //
    }

    public function get(Customer $customer, Number $number)
    {
        return response()->json($number->preferences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer, Number $number)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer, Number $number)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'value' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'value.required' => 'Value is required',
            ]
        );

        $validator->validate();

        $preference = $number->preferences()->create($request->all());
        return response()->json($preference);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumberPreference  $preference
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Number $number, NumberPreference $preference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NumberPreference  $preference
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Number $number, NumberPreference $preference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberPreference  $preference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Number $number, NumberPreference $preference)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'value' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'value.required' => 'Value is required',
            ]
        );

        $validator->validate();

        $preference->update($request->all());
        return back()->with('success', 'Preference updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumberPreference  $preference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Number $number, NumberPreference $preference)
    {
        $preference->delete();
        return back()->with('success', 'Preference deleted successfully');
    }
}

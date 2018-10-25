<?php

namespace App\Http\Controllers\User;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Create an instance of the controller class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('customers.show')->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        Customer::createNew($request);

        return back()->with(getAlert('Your profile has been saved.', 'success'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request)
    {
        Auth::user()->customer->saveChanges($request);

        return back()->with(getAlert('Your profile has been saved.', 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
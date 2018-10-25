<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::signUp($request);

        return back()->with(getAlert('Thank you for registering with us. You can now sign in to track your order.', 'success'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('users.show')->with([
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request)
    {
        Auth::user()->saveChanges($request);

        return back()->with(getAlert('Your account changes has been saved,', 'success'));
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

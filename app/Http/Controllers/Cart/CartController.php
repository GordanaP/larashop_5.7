<?php

namespace App\Http\Controllers\Cart;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request, Product $product)
    {
        $buyable = $product->findBuyable($product->id, $request->size_id, $request->color_id);

        Cart::addItem($buyable, $request->qty);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cartItems = Cart::getItems();

        return view('carts.show', compact('cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $rowId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        Cart::updateItem($rowId, $request->qty);

        return back();
    }

    /**
     * Remove an item from the specified resource.
     *
     * @param  string  $rowId
     * @return \Illuminate\Http\Response
     */
    public function remove($rowId)
    {
        Cart::removeItem($rowId);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        Cart::empty();

        return back();
    }
}

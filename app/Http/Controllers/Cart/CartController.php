<?php

namespace App\Http\Controllers\Cart;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('order.pending')->only('checkout');
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
        $inventory = $product->findInventory($product->id, $request->size_id, $request->color_id);

        $preAddCount = Cart::itemsCount();

        Cart::addItem($inventory, $request->qty);

        $postAddCount = Cart::itemsCount();

        return back()->with($this->storeAlert($preAddCount, $postAddCount));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $rowId
     * @return \Illuminate\Http\Response
     */
    public function update(CartRequest $request, $rowId)
    {
        Cart::updateItem($rowId, $request->qty);

        return back()->with(getAlert('The cart has been updated', 'success'));
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

        return back()->with(getAlert('The item has been removed from the cart.', 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        Cart::empty();

        return back()->with(getAlert('The cart is now empty!', 'success'));
    }

    /**
     * Display checkout page.
     *
     * @return  \Illuminate\Http\Response
     */
    public function checkout()
    {
        return view('carts.checkout');
    }

    /**
     * Get the alert.
     *
     * @param  string $preAddCount
     * @param  string $postAddCount
     * @return array
     */
    protected function storeAlert($preAddCount, $postAddCount)
    {
        return $preAddCount == $postAddCount
            ? getAlert('The item is already in the cart.', 'warning')
            : getAlert('The item has been added to cart.', 'success');
    }
}
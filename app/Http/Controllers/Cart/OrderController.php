<?php

namespace App\Http\Controllers\Cart;

use App\Events\OrderHasBeenPlaced;
use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
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
        return view('orders.create');

        if (request()->ajax()) {

            $cartItems = Cart::getItems();

            $view = View::make('orders.html._items', compact('cartItems'))->render();

            return response([ 'view' => $view ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::placeNew($request);

        event(new OrderHasBeenPlaced($order));

        return redirect()->route('orders.show', $order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function printPDF()
    {
        $pdf = PDF::loadView('invoice');

        return $pdf->download('order.pdf');
    }
}
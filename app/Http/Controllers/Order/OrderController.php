<?php

namespace App\Http\Controllers\Order;

use App\Events\OrderHasBeenPlaced;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Services\Utilities\PDF\AppPDF;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('order.pending')->only('create');
        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index')->with([
            'user' => Auth::user()->load('customer.orders.shipping'),
            'userOrders' => optional(Auth::user()->customer)->orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::placeNew($request);

        $invoice = AppPDF::generate('orders.pdf._invoice', compact('order'));

        event(new OrderHasBeenPlaced($order, $invoice));

        return redirect()->route('orders.show', $order)
            ->with(getAlert('Thank you for your order.', 'success'));
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
}
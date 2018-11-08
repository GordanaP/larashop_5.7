<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favorites.index')->with([
            'favorites' => Auth::user()->favorites->load('inventories', 'reviews')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        Auth::user()->toggleFavorite($product);

        return back()->with($this->storeResponse($product));
    }

    /**
     * Get the alert for the store method.
     *
     * @param  \App\Product $product
     * @return array
     */
    protected function storeResponse($product)
    {
        return Auth::user()->hasFavorited($product)
            ? getAlert('The product is added to your favorites', 'success')
            : getAlert('The product is removed from your favorites', 'success');
    }
}
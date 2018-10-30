<?php

namespace App\Http\Controllers\Product;

use App\Filters\Product\ProductFilters;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Filters\Product\ProductFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(ProductFilters $filters)
    {
        $products = Product::with('inventories')->available()->filter($filters)->inRandomOrder()->paginate(6);

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(request()->ajax()) {
            return response([
                'product' => $product->load('inventories'),
            ]);
        }

        return view('products.show', compact('product'));
    }

    /**
     * Display the product's image.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showImage(Product $product)
    {
        $file = Storage::disk('public')->get($product->image);

        return $file;
    }
}
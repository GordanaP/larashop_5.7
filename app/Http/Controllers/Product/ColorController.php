<?php

namespace App\Http\Controllers\Product;

use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colors = Color::findMany($request->colors_ids);

        $view = View::make('products.html._sizecolors', compact('colors'))->render();

        if(request()->ajax()) {
            return response([
                'view' => $view,
            ]);
        }
    }
}

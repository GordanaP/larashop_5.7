@extends('layouts.app')

@section('title', '| Product')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <img src="https://via.placeholder.com/350x250" alt="Product Image" class="image">
            </div>

            <div class="col-md-7">
                <h3>{{ $product->name }}</h3>

                <p>{{ $product->present_price }}</p>

                <p>{{ $product->description }}</p>

                <form action="{{ route('carts.store', $product) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="color_id">Color</label>
                        <select name="color_id" id="color_id" class="form-control">
                            <option value="">Select a color</option>
                            <option value="1">Red</option>
                            <option value="2">Blue</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="size_id">Size</label>
                        <select name="size_id" id="size_id" class="form-control">
                            <option value="">Select a size</option>
                            <option value="1">Small</option>
                            <option value="2">Medium</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="qty">Qty:</label>
                        <input type="text" name="qty" id="qty" class="form-control" value="1" style="width: 20% !important">
                    </div>

                    <div class="form-group">
                        <button class="btn bg-grey-dark text-white uppercase pull-right">Add to cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


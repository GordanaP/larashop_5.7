@extends('layouts.app')

@section('title', '| Product')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">

                        <div class="col-md-4">
                            <img class="image w-full" src="{{ asset('images/products/default.jpg') }}" alt="Card image cap">
                        </div>

                        <div class="col-md-6 py-4 pl-5">

                            <h3 class="mb-3 font-semibold">{{ $product->name }}</h3>

                            <div class="mb-4 text-muted text-lg">{{ $product->present_price }}</div>

                            <p class="card-text mb-5">{{ $product->description }}</p>

                            <form action="{{ route('carts.store', $product) }}" method="POST">

                                @csrf

                                <div class="form-group row mb-4">
                                    <label for="color_id" class="col-sm-2 col-form-label">Color</label>
                                    <div class="col-sm-8">
                                        <select name="color_id" id="color_id" class="form-control">
                                            <option value="">Select a color</option>
                                            <option value="1">Red</option>
                                            <option value="2">Blue</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="size_id" class="col-sm-2 col-form-label">Size</label>
                                    <div class="col-sm-8">
                                        <select name="size_id" id="size_id" class="form-control">
                                            <option value="">Select a size</option>
                                            <option value="1">Small</option>
                                            <option value="2">Medium</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="size_id" class="col-sm-2 col-form-label">Qty</label>
                                    <div class="col-sm-8 flex">
                                        <input type="text" name="qty" id="qty" class="form-control text-center mr-2 w-40" value="{{ old('qty') ?: 1 }}">

                                        <button class="btn bg-indigo-dark text-white uppercase ml-2 w-60">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card"  style="border-radius: 0; border: none; background: #f9f9f9">
                    <div class="card-body">
                        @include('customers.forms._save')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        removeErrorOnNewInput()

    </script>
@endsection
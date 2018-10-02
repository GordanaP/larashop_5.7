@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Welcome page</h1>

        @php

            $key = 6;

            function generateCode()
            {
                return Keygen::bytes()->generate(
                    function($key) {
                        // Generate a random numeric key
                        $random = Keygen::numeric()->generate();

                        // Manipulate the random bytes with the numeric key
                        return substr(md5($key . $random . strrev($key)), mt_rand(0,8), 8);
                    },
                    // function($key) {
                    //     // AddPP a (-) after every fourth character in the key
                    //     return join('-', str_split($key, 4));
                    // },
                    'strtoupper'
                );
            }

            echo generateCode();
        @endphp
    </div>
@endsection

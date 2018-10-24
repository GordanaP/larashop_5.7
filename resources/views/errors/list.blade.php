@if ($errors->any())
    <div class="alert bg-red-lightest" role="alert">
        <ul class="pl-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
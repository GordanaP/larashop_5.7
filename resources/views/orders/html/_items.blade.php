<table class="table mb-0">
    <body>

        @foreach ($cartItems as $item)

            <tr class="text-xs">
                <td class="pl-0 width="20%>
                    <img src="{{ $item->product->image }}" alt="{{ $item->name }}" class="image" >
                </td>

                <td >
                    {{ $item->name }}
                </td>

                <td class="pull-right">
                    {{ presentPrice($item->price) }}
                </td>

                <td class="pr-0">
                    {{ $item->qty }}
                </td>
            </tr>

        @endforeach

    </body>
</table>
// Display ordered items
var createOrderUrl = "{{ route('order.create') }}";

$.ajax({
    url : createOrderUrl,
    type: "GET",
    success: function(response) {

        $('#orderedItems').html(response.view);
    }
})

// Toggle show more -show less text
$(document).on('click', '#toggleOrderedItems', function()
{
    var text = $(this).text() == "Show less" ? "Show more" : "Show less";

    $(this).text( text );
})
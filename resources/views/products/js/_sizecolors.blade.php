var showProductUrl ="{{ route('products.show', $product) }}";
var indexColorsUrl = "{{ route('colors.index') }}";
var selectSize = $('select#size_id');
var selectColor = $('select#color_id');

$(document).on('change', '#size_id', function(){

    var size_id = this.value;
    var colors_ids = [];

    // Get available colors_ids for the specific size
    $.ajax({
        url: showProductUrl,
        type: "GET",
        dataType: "json",
        async: false,
        success: function(response)
        {
            var buyables = response.product.buyables;

            $.each(buyables, function(index, buyable) {
                 if (size_id == buyable.size_id) {
                      colors_ids.push(buyable.color_id);
                 }
            });
        }
    });

    // Get the view with the select box for the above colors
    $.ajax({
        url: indexColorsUrl,
        type: "POST",
        data: {
            colors_ids : colors_ids
        },
        success: function(response)
        {
            selectColor.html(response.view)
        }
    });
})

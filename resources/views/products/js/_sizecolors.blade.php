// var showProductUrl ="{{ route('products.show', $product) }}";
var showProductUrl ="{{ route('product.show', $product) }}";
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
            var inventories = response.product.inventories;

            console.log(response)

            $.each(inventories, function(index, inventory) {
                 if (size_id == inventory.size_id) {
                      colors_ids.push(inventory.color_id);
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

selectSize.on('change', function () {

    // var size_id = this.value;
    // var colors_ids = [];

    // $.ajax({
    //     url: showProductUrl,
    //     type: "GET",
    //     dataType: "json",
    //     async: false,
    //     success: function(response)
    //     {
    //         var buyables = response.product.buyables;

    //         $.each(buyables, function(index, buyable) {
    //              if (size_id == buyable.size_id) {
    //                   colors_ids.push(buyable.color_id);
    //              }
    //         });
    //     }
    // });

    var color = 'blue'

    $.ajax({
        url: indexColorsUrl,
        type: "POST",
        data: {
            color : color
        },
        success: function(response)
        {
            console.log(response)
        }
    });
});

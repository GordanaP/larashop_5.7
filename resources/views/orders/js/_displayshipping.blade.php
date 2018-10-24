var createShippingsUrl = "{{ route('shippings.create') }}";

$.ajax({
    type: "GET",
    url: createShippingsUrl,
    success: function(response)
    {
        var shippingView = response.view;
        var shippingCheck = $('#shipping');
        var shippingDetails = $('#shippingDetails');

        shippingCheck.on('change', function(){
             if (this.checked) {
                 shippingDetails.empty();
             }
             else
             {
                 shippingDetails.html(shippingView)
             }
        });
    }
});
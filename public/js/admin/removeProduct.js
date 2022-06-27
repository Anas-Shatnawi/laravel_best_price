$(document).on('click', '.delete_product', function(event) {
    event.preventDefault();
    var product_id = $(this).val();
    $('#delete_product_id').val(product_id);
    $('#DeleteProductModal').modal('show')
})

$(document).on('click', '#close-modal-btn', function() {
    $('#DeleteProductModal').modal('hide');
})

$(document).on('click', '.delete_product_btn', function(event) {
    event.preventDefault();
    var product_id = $('#delete_product_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "/delete-product/" + product_id,
        success: function(response) {
            console.log(response);
            $('#success_message').addClass('alert alert-success');
            $('#success_message').text(response.message);
            $('#DeleteProductModal').modal('hide');
            location.reload(true);
        }
    })
})
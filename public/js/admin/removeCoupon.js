$(document).on('click', '.delete_coupon', function(event) {
    event.preventDefault();
    var coupon_id = $(this).val();
    $('#delete_coupon_id').val(coupon_id);
    $('#DeleteCouponModal').modal('show')
    console.log('hiiii')
})
$(document).on('click', '#close-modal-btn', function() {
    $('#DeleteCouponModal').modal('hide');
})

$(document).on('click', '.delete_coupon_btn', function(event) {
    event.preventDefault();
    var coupon_id = $('#delete_coupon_id').val();
    console.log('hiiii')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log('hiiii')
    $.ajax({
        type: "DELETE",
        url: "/delete-coupon/" + coupon_id,
        success: function(response) {
            console.log('hiiii')
            console.log(response);
            $('#success_message').addClass('alert alert-success');
            $('#success_message').text(response.message);
            $('#DeleteCouponModal').modal('hide');
            location.reload(true);
        }
    })
})
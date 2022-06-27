$(document).on('click', '.delete_location', function(event) {
    event.preventDefault();
    var location_id = $(this).val();
    $('#delete_location_id').val(location_id);
    $('#DeleteLocationModal').modal('show')
})

$(document).on('click', '#close-modal-btn', function() {
    $('#DeleteLocationModal').modal('hide');
})

$(document).on('click', '.delete_location_btn', function(event) {
    event.preventDefault();
    var location_id = $('#delete_location_id').val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type: "DELETE",
        url: "/delete-location/" + location_id,
        success: function(response) {
            console.log(response);
            $('#success_message').addClass('alert alert-success');
            $('#success_message').text(response.message);
            $('#DeleteLocationModal').modal('hide');
            location.reload(true);
        }
    })
})
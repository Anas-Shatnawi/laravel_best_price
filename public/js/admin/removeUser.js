$(document).on('click', '.delete_user', function(event) {
    event.preventDefault();
    var user_id = $(this).val();
    $('#delete_user_id').val(user_id);
    $('#DeleteUserModal').modal('show')
})

$(document).on('click', '#close-modal-btn', function() {
    $('#DeleteUserModal').modal('hide');
})

$(document).on('click', '.delete_user_btn', function(event) {
    event.preventDefault();
    var user_id = $('#delete_user_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "/delete-user/" + user_id,
        success: function(response) {
            console.log(response);
            $('#success_message').addClass('alert alert-success');
            $('#success_message').text(response.message);
            $('#DeleteUserModal').modal('hide');
            location.reload(true);
        }
    })
})
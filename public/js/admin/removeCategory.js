$(document).on('click', '.delete_category', function(event) {
    event.preventDefault();
    var category_id = $(this).val();
    $('#delete_category_id').val(category_id);
    $('#DeleteCategoryModal').modal('show')
})
$(document).on('click', '#close-modal-btn', function() {
    $('#DeleteCategoryModal').modal('hide');
})

$(document).on('click', '.delete_category_btn', function(event) {
    event.preventDefault();
    var category_id = $('#delete_category_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "/delete-category/" + category_id,
        success: function(response) {
            console.log(response);
            $('#success_message').addClass('alert alert-success');
            $('#success_message').text(response.message);
            $('#DeleteCategoryModal').modal('hide');
            location.reload(true);
        }
    })
})
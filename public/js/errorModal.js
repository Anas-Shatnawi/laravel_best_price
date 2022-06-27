$((function() {
    $("#ErrorModal").modal('show');
    })
);

$(document).on('click', '#close-modal-btn', function() {
    $('#ErrorModal').modal('hide');
})
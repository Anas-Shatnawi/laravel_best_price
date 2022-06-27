// let item_id = null;

// function getItemId(id) {
// }

function getItemId(id) {
    item_id = $('#delete_item_id_' + id).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: "/delete-from-cart/" + item_id,
        success: function(response) {
            location.reload(true);
        }  
    })
}
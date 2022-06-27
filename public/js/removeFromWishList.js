$(".deleteRecord").click(function() {
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: "delete-from-wish-list/" + id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function() {
            location.reload(true);
        }
    });

});
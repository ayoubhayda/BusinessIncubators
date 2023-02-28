$(document).ready(function () {
    // Add user form submission using AJAX
    $('#add-user-form').on('submit', function (event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize();
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (response) {
                $('#addModal').modal('hide');
                $('.usersTable').append(response);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    // Update user form submission using AJAX
    $('.update-user-form').on('submit', function (event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize();
        $.ajax({
            type: 'PUT',
            url: url,
            data: formData,
            success: function (response) {
                $('#updateModal').modal('hide');
                $('#user_' + response.id).replaceWith(response.view);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    // Delete user using AJAX
    $(document).on('click', '.delete-user', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        var tr = $(this).closest('tr');
        $.ajax({
            type: 'DELETE',
            url: url,
            success: function (response) {
                tr.remove();
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
});

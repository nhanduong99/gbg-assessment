
$('.delete-user-btn').click(function(e) {
    confirmBox('Delete this user',
        'Are you sure for deleting this user?',
        'Yes', 'No',
        deleteUser,
        $(this).attr('data-username'));
})

function deleteUser(username) {
    $.ajax({
        url: '/delete-user',
        type: 'POST',
        dataType: 'json',
        data: {
            username: username
        },
        success: function(data) {
            if (data.error) {
                confirmBox(data.message,
                    'Somethings went wrong when deleting this user',
                    '', 'Ok');
            } else {
                confirmBox(data.message,
                    'Deleted this user successfully',
                    'Nice', 'Ok', reloadPage);
            }
        }
    });
}

function reloadPage() {
    window.location.reload();
}

function confirmBox(title, msg, yes, no, callback = null, param = null) {
    let content =  "<div class='dialog-ovelay'>" +
        "<div class='dialog'>" +
        "<header>" +
        " <h3> " + title + " </h3> " +
        "</header>" +
        "<div class='dialog-msg'>" +
        " <p> " + msg + " </p> " +
        "</div>" +
        "<footer>" +
        "<div class='controls'>" +
        (yes ? " <button class='button button-danger doAction'>" + yes + "</button> " : "")+
        " <button class='button button-default cancelAction'>" + no + "</button> " +
        "</div>" +
        "</footer>" +
        "</div>" +
        "</div>";
    $('body').prepend(content);

    $('.doAction').click(function () {
        param ? callback(param) : callback();
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });
    $('.cancelAction, .fa-close').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });

}

function getUserDetails(username) {
    $.ajax({
        url: '/user-detail',
        type: 'POST',
        dataType: 'json',
        data: {
            username: username
        },
        success: function(res) {
            if (res.error) {
                confirmBox(res.message,
                    'data.message',
                    '', 'Ok');
            } else {
                $('#username').val(res.data['username']);
                $('#email').val(res.data['email']);
                $('#birthday').val(res.data['birthday']);
                $('#phone_number').val(res.data['phone_number']);
                $('#url').val(res.data['url']);
                $('#popup-user-detail').show();
            }
        }
    });
}
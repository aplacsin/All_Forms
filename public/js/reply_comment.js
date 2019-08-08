$(document).ready(function () {
    let button = $('.form-group-button-reply'),
        level = '',
        form_reply = $('.wrapper-forms'),
        back = $('.back');

    $('#comment_form_reply').on('submit', function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "../module/reply_comment.php",
            method: "POST",
            data: form_data,
            dataType: "JSON",
            success: function (data) {
                if (data.error != '') {
                    $('#display_comment_reply').before($('#comment_form_reply'));
                    form_reply[0].classList.add('hide');
                    $('#comment_form_reply')[0].reset();
                    $('#comment_message_reply').html(data.error);
                    $('#comment_id_reply').val('0');
                    load_comment();
                }
            }
        })
    });

    function load_comment() {
        $.ajax({
            url: "../module/fetch_comment.php",
            method: "POST",
            success: function (data) {
                $('#display_comment').html(data);
            }
        })
    }



    $(document).on('click', '.reply', function () {
        let comment_id = $(this).attr("id");
        parentID = $(this).attr("id");
        level = $(this);
        level = level.parent().parent().parent().parent();
        level = level[0].classList[2];
        $('#comment_id_reply').val(comment_id);
        $('#' + comment_id).parent().append($('#comment_form_reply')); /* adding a form for a child comment */

        $('#comment_content_reply').focus();
    });


    /* back button to add parent comments */
    $(document).on('click', '.back', function () {
        $('#comment_form_reply')[0].reset();
        level = "level-0";
    });
});
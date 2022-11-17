jQuery(document).ready(function ($) {

    $('.addwishlist').click(function () {

        let postID = $(this).find('input[name="post_id"]').val();
        $.ajax({
            url: wishlist_ajax_obj.ajaxurl,
            dataType: 'JSON',
            data: {
                'action': 'add_wishlist_ajax_request',
                'postID': postID,
            },
            beforeSend: function () {


            },
            success: function (data) {
                if (data.action === 'added') {
                    Swal.fire({
                        icon: 'success',
                        text: data.content,
                        confirmButtonText: data.confirm,
                        timer: 4000,
                    })
                    setTimeout(function(){  location.reload() }, 2000);
                } else if (data.action === 'exists') {
                    location.replace(data.content);
                } else if (data.action === 'login') {
                    Swal.fire({
                        icon: 'error',
                        text: data.content,
                        confirmButtonText: data.confirm,
                        timer: 2000,
                    })
                }


            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

    })
    $('.deletewishlist ').click(function () {

        let postID = $(this).find('input[name="post_id"]').val();
        $.ajax({
            url: wishlist_ajax_obj.ajaxurl,
            dataType: 'JSON',
            data: {
                'action': 'delete_wishlist_ajax_request',
                'postID': postID,
            },
            beforeSend: function () {


            },
            success: function (data) {
                if (data.action === 'deleted') {
                    Swal.fire({
                        icon: 'success',
                        text: data.content,
                        confirmButtonText: data.confirm,
                        timer: 2000,
                    })
                    setTimeout(function(){  location.reload() }, 2000);
                } else if (data.action === 'exists') {
                    location.replace(data.content);
                } else if (data.action === 'login') {
                    Swal.fire({
                        icon: 'error',
                        text: data.content,
                        confirmButtonText: data.confirm,
                        timer: 2000,
                    })
                }


            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

    })


});
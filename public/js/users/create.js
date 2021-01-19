$(document).ready(function() {
    $(document).on('click', '#submit-form', function () {
        preventDefault();
        let name = $(this).find('.name');
        let last_name = $(this).find('.last_name');
        let email = $(this).find('.email');
        let action = $(this).attr('action');

        $.ajax({
            type: "POST",
            url:action,
            data:{
                name:name,
                last_name:last_name,
                email:email
            },
        });
    })
});

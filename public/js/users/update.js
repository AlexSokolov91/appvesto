$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.submit-form', function (update) {
        update.preventDefault();
        let name = $('.name').val();
        let last_name = $('.last_name').val();
        let email = $('.email').val();
        let action = $('#form').attr('action');

        $.ajax({
            type :'POST',
            url: action,
            data: {
                name:name,
                last_name:last_name,
                email:email
            },
            success:Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'User updated',
                showConfirmButton: false,
                timer: 1500
            })
        });

    });
});

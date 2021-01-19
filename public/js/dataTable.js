$(document).ready(function () {
    $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: "/",
        },
        columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'last_name',
                name: 'last_name',
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'action',
                name: 'action',
                orderable:false
            }
        ]
    });
    $(document).on('click', '.edit', function (edit){
        let action = $('.edit').attr('data-action');
       location.href= action;
    });

    $(document).on('click', '.delete', function (del){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let action = $(this).attr('data-action');
        let id = $(this).attr('id');
        console.log(action);
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    'type': 'POST',
                    'url': action,
                    'data': {
                        'id': id,
                    }
                })

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                location.reload();
            }
        });
    });
});

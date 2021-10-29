$(document).ready( function () {
    $('.datatable').DataTable({
        ajax: '/includes/route.php?type=get',
        columns: [
            {data: 'id'},
            {data: 'fname'},
            {data: 'lname'},
            {data: 'phone'},
            {data: 'id',
                fnCreatedCell: function(td, id) {
                    $(td).html('<div class="text-right"><a href="/update.php?id='+id+'" title="Update this record" class="btn btn-outline-primary mx-2"><em class="fa fa-pen"></em></a><a href="/delete.php?id='+id+'" title="Delete this record" class="btn btn-outline-danger" onClick="return confirm(\'Are you shure you want to delete this record?\');"><em class="fa fa-trash"></em></a></div>')
                }
            },
        ],
        columnDefs: [{
            targets: [4],
            orderable: false
        }]
    });

    $('.phone').mask('000-000-000');

    $('.form').validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            phone: {
                required: true,
                minlength: 9
            }
        },
        messages: {
            fname: 'A first name is required',
            lname: 'A last name is required',
            phone: {
                required: 'A phone number is required',
                minlength: jQuery.validator.format('At least {0} characters required!')
            },
        },
        errorClass: 'is-invalid text-danger',
        submitHandler: function(form) {
            form.submit();
        }
    })
} );
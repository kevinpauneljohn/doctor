function clear_errors()
{
    let i;
    for (i = 0; i < arguments.length; i++) {

        if($('#'+arguments[i]).val().length > 0){
            $('.'+arguments[i]).closest('div.'+arguments[i]).removeClass('has-error').find('.text-danger').remove();
        }
    }
}
/*add new role*/
$(document).on('submit','#role-form', function(form){
    form.preventDefault();

    let value = $('#role-form').serialize();

    $.ajax({
        'url' : '/roles',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type' : 'POST',
        'data' : value,
        'cache' : false,
        success: function(result, status, xhr){
            console.log(result);

            if(result.success === true)
            {
                setTimeout(function(){
                    /*$('#role_form').trigger('reset');
                    $('#roles').modal('toggle');*/
                    toastr.success('New Role Successfully Added!')

                    setTimeout(function(){
                        location.reload();
                    },1500);
                });
            }
            $.each(result, function (key, value) {
                var element = $('#'+key);

                element.closest('div.'+key)
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                element.after('<p class="text-danger">'+value+'</p>');
            });

        },error: function(xhr, status, error){

        }
    });
    clear_errors('role');
});

/*end of add new role*/

/*flash edit form*/
var edit_modal = $('#edit-role-modal');
$(document).on('click','.edit-role',function () {
    edit_modal.modal('show');
});
/*End of flash edit form*/
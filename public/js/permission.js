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
$(document).on('submit','#permission-form', function(form){
    form.preventDefault();

    let value = $('#permission-form').serialize();

    $.ajax({
        'url' : '/permissions',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'type' : 'POST',
        'data' : value,
        'cache' : false,
        success: function(result, status, xhr){
            if(result.success === true)
            {
                setTimeout(function(){
                    toastr.success('New Permission Successfully Added!')

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
            console.log(xhr);
        }
    });
    clear_errors('permission');
});

/*end of add new role*/

/*flash edit form*/
var edit_modal = $('#edit-permission-modal');
$(document).on('click','.edit-permission',function () {
    edit_modal.modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#id').val(this.id);
    $('#editPermission').val(data[0]);
});
/*End of flash edit form*/

/*store update permission name*/
$(document).on('submit','#edit-permission-form',function (form) {
    form.preventDefault();
    let url = $('#url').val();
    let id = $('#id').val();
    let value = $('#edit-permission-form').serialize();

    $.ajax({
        'url' : '/'+url+'/'+id,
        'type' : 'POST',
        'data' : value,
        'cache' : false,
        success: function (result, status, xhr) {
            if(result.success === true)
            {
                setTimeout(function(){
                    /*$('#role_form').trigger('reset');
                    $('#roles').modal('toggle');*/
                    toastr.success('Permission Successfully Updated!')

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
            console.log("error: "+error+" status: "+status+" xhr: "+xhr);
        }
    });
    clear_errors('editPermission');
});
/*end store update permission name*/